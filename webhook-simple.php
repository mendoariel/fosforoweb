<?php
/**
 * Sistema Simple de Webhook para Contactos
 * Envía datos a un webhook configurado (Zapier, IFTTT, etc.)
 */

class SimpleWebhookService {
    private $webhookUrl;
    private $backupFile;
    
    public function __construct($webhookUrl = null) {
        // URL del webhook - configúrala aquí
        $this->webhookUrl = $webhookUrl ?: 'https://hooks.zapier.com/hooks/catch/YOUR_WEBHOOK_ID/';
        $this->backupFile = 'contacts_' . date('Y-m') . '.txt';
    }
    
    /**
     * Procesa el contacto y envía por webhook
     */
    public function processContact($name, $email, $phone, $message) {
        $contactData = [
            'timestamp' => date('Y-m-d H:i:s'),
            'name' => $name,
            'email' => $email,
            'phone' => $phone ?: 'No proporcionado',
            'message' => $message,
            'source' => 'fosforoweb.com.ar',
            'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
            'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'unknown'
        ];
        
        // Intentar enviar por webhook
        $webhookResult = $this->sendToWebhook($contactData);
        
        // Siempre guardar como respaldo
        $this->saveToFile($contactData);
        
        // Guardar en base de datos si es posible
        $this->saveToDatabase($contactData);
        
        return [
            'success' => true,
            'webhook_sent' => $webhookResult['success'],
            'method' => $webhookResult['success'] ? 'Webhook' : 'Backup File',
            'data' => $contactData
        ];
    }
    
    /**
     * Envía datos al webhook
     */
    private function sendToWebhook($data) {
        if (empty($this->webhookUrl) || $this->webhookUrl === 'https://hooks.zapier.com/hooks/catch/YOUR_WEBHOOK_ID/') {
            return ['success' => false, 'error' => 'Webhook no configurado'];
        }
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->webhookUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'User-Agent: FosforoWeb-ContactForm/1.0'
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);
        
        if ($error) {
            error_log("Webhook error: " . $error);
            return ['success' => false, 'error' => $error];
        }
        
        if ($httpCode >= 200 && $httpCode < 300) {
            error_log("Webhook enviado exitosamente: " . $response);
            return ['success' => true, 'response' => $response];
        } else {
            error_log("Webhook failed: HTTP $httpCode - $response");
            return ['success' => false, 'error' => "HTTP $httpCode: $response"];
        }
    }
    
    /**
     * Guarda en archivo como respaldo
     */
    private function saveToFile($data) {
        $line = implode(' | ', [
            $data['timestamp'],
            $data['name'],
            $data['email'],
            $data['phone'],
            str_replace(["\n", "\r"], ' ', $data['message']),
            $data['ip']
        ]) . "\n";
        
        file_put_contents($this->backupFile, $line, FILE_APPEND | LOCK_EX);
        error_log("Contacto guardado en archivo: {$data['name']} ({$data['email']})");
    }
    
    /**
     * Guarda en base de datos si es posible
     */
    private function saveToDatabase($data) {
        try {
            require_once 'includes/config.php';
            $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Crear tabla si no existe
            $createTable = "CREATE TABLE IF NOT EXISTS contacts (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(100) NOT NULL,
                email VARCHAR(100) NOT NULL,
                phone VARCHAR(20),
                message TEXT NOT NULL,
                ip_address VARCHAR(45),
                user_agent TEXT,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";
            $conn->exec($createTable);
            
            // Insertar contacto
            $stmt = $conn->prepare("INSERT INTO contacts (name, email, phone, message, ip_address, user_agent) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([
                $data['name'],
                $data['email'],
                $data['phone'],
                $data['message'],
                $data['ip'],
                $data['user_agent']
            ]);
            
            error_log("Contacto guardado en BD: {$data['name']} ({$data['email']})");
            
        } catch (Exception $e) {
            error_log("Error guardando en BD: " . $e->getMessage());
        }
    }
    
    /**
     * Obtiene estadísticas de contactos
     */
    public function getStats() {
        $stats = [
            'total_contacts' => 0,
            'contacts_today' => 0,
            'last_contact' => null,
            'webhook_status' => 'No configurado'
        ];
        
        // Contar contactos en archivo
        if (file_exists($this->backupFile)) {
            $lines = file($this->backupFile, FILE_IGNORE_NEW_LINES);
            $stats['total_contacts'] = count($lines);
            
            // Contar de hoy
            $today = date('Y-m-d');
            foreach ($lines as $line) {
                if (strpos($line, $today) === 0) {
                    $stats['contacts_today']++;
                }
            }
            
            // Último contacto
            if (!empty($lines)) {
                $lastLine = end($lines);
                $stats['last_contact'] = $lastLine;
            }
        }
        
        // Verificar estado del webhook
        if ($this->webhookUrl && $this->webhookUrl !== 'https://hooks.zapier.com/hooks/catch/YOUR_WEBHOOK_ID/') {
            $stats['webhook_status'] = 'Configurado';
        }
        
        return $stats;
    }
}
?>
