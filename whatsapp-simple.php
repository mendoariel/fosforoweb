<?php
/**
 * Sistema Simple de WhatsApp usando servicios populares
 * Más fácil de configurar que la API oficial
 */

class SimpleWhatsAppService {
    private $service;
    private $config;
    
    public function __construct($service = 'zapier') {
        $this->service = $service;
        $this->config = $this->getServiceConfig($service);
    }
    
    /**
     * Configuración para diferentes servicios
     */
    private function getServiceConfig($service) {
        $configs = [
            'zapier' => [
                'url' => 'https://hooks.zapier.com/hooks/catch/YOUR_ZAPIER_WEBHOOK_ID/',
                'method' => 'POST',
                'format' => 'json'
            ],
            'make' => [
                'url' => 'https://hook.eu1.make.com/YOUR_MAKE_WEBHOOK_ID',
                'method' => 'POST', 
                'format' => 'json'
            ],
            'ifttt' => [
                'url' => 'https://maker.ifttt.com/trigger/YOUR_EVENT_NAME/with/key/YOUR_KEY',
                'method' => 'POST',
                'format' => 'json'
            ],
            'twilio' => [
                'url' => 'https://api.twilio.com/2010-04-01/Accounts/YOUR_ACCOUNT_SID/Messages.json',
                'method' => 'POST',
                'format' => 'form',
                'auth' => 'basic'
            ]
        ];
        
        return $configs[$service] ?? $configs['zapier'];
    }
    
    /**
     * Envía notificación de contacto
     */
    public function sendContactNotification($name, $email, $phone, $message) {
        $data = [
            'timestamp' => date('Y-m-d H:i:s'),
            'name' => $name,
            'email' => $email,
            'phone' => $phone ?: 'No proporcionado',
            'message' => $message,
            'source' => 'fosforoweb.com.ar',
            'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
            'formatted_message' => $this->formatMessage($name, $email, $phone, $message)
        ];
        
        return $this->sendToService($data);
    }
    
    /**
     * Formatea el mensaje para WhatsApp
     */
    private function formatMessage($name, $email, $phone, $message) {
        $text = "🆕 *Nuevo Mensaje de Contacto*\n\n";
        $text .= "👤 *Nombre:* {$name}\n";
        $text .= "📧 *Email:* {$email}\n";
        $text .= "📱 *Teléfono:* " . ($phone ?: 'No proporcionado') . "\n";
        $text .= "💬 *Mensaje:*\n{$message}\n\n";
        $text .= "📅 *Fecha:* " . date('d/m/Y H:i:s') . "\n";
        $text .= "🔗 *Fuente:* fosforoweb.com.ar";
        
        return $text;
    }
    
    /**
     * Envía datos al servicio configurado
     */
    private function sendToService($data) {
        $config = $this->config;
        
        if (strpos($config['url'], 'YOUR_') !== false) {
            return ['success' => false, 'error' => 'Servicio no configurado'];
        }
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $config['url']);
        curl_setopt($ch, CURLOPT_POST, 1);
        
        // Configurar headers según el servicio
        $headers = ['Content-Type: application/json'];
        
        if ($config['format'] === 'json') {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        } else {
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            $headers = ['Content-Type: application/x-www-form-urlencoded'];
        }
        
        // Autenticación básica para Twilio
        if (isset($config['auth']) && $config['auth'] === 'basic') {
            $headers[] = 'Authorization: Basic ' . base64_encode($this->config['username'] . ':' . $this->config['password']);
        }
        
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);
        
        if ($error) {
            error_log("WhatsApp service error: " . $error);
            return ['success' => false, 'error' => $error];
        }
        
        if ($httpCode >= 200 && $httpCode < 300) {
            error_log("WhatsApp notification sent successfully via " . $this->service);
            return ['success' => true, 'method' => $this->service, 'response' => $response];
        } else {
            error_log("WhatsApp service failed: HTTP $httpCode - $response");
            return ['success' => false, 'error' => "HTTP $httpCode: $response"];
        }
    }
    
    /**
     * Envía mensaje de prueba
     */
    public function sendTestMessage() {
        $data = [
            'timestamp' => date('Y-m-d H:i:s'),
            'name' => 'Prueba',
            'email' => 'test@fosforoweb.com.ar',
            'phone' => '+549261123456',
            'message' => 'Este es un mensaje de prueba del sistema de contactos.',
            'source' => 'fosforoweb.com.ar',
            'formatted_message' => "🧪 *Prueba de WhatsApp*\n\nEl sistema de contactos de Fosforo Web está funcionando correctamente.\n📅 " . date('d/m/Y H:i:s')
        ];
        
        return $this->sendToService($data);
    }
}
?>
