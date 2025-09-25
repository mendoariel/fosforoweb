<?php
/**
 * Sistema de Notificaciones por WhatsApp
 * Envía notificaciones a WhatsApp cuando llega un contacto
 */

class WhatsAppNotificationService {
    private $apiKey;
    private $phoneNumber;
    private $instanceId;
    
    public function __construct($apiKey = null, $phoneNumber = null, $instanceId = null) {
        // Configura estos valores según el servicio que uses
        $this->apiKey = $apiKey ?: 'TU_API_KEY_AQUI';
        $this->phoneNumber = $phoneNumber ?: 'TU_NUMERO_WHATSAPP_AQUI';
        $this->instanceId = $instanceId ?: 'TU_INSTANCE_ID_AQUI';
    }
    
    /**
     * Envía notificación de nuevo contacto
     */
    public function sendContactNotification($name, $email, $phone, $message) {
        $text = "🆕 *Nuevo Mensaje de Contacto - Fosforo Web*\n\n";
        $text .= "👤 *Nombre:* {$name}\n";
        $text .= "📧 *Email:* {$email}\n";
        $text .= "📱 *Teléfono:* " . ($phone ?: 'No proporcionado') . "\n";
        $text .= "💬 *Mensaje:*\n{$message}\n\n";
        $text .= "📅 *Fecha:* " . date('d/m/Y H:i:s') . "\n";
        $text .= "🌐 *IP:* " . ($_SERVER['REMOTE_ADDR'] ?? 'No disponible') . "\n";
        $text .= "🔗 *Fuente:* fosforoweb.com.ar";
        
        return $this->sendMessage($text);
    }
    
    /**
     * Método 1: WhatsApp Business API (Oficial)
     */
    private function sendWithBusinessAPI($message) {
        if ($this->apiKey === 'TU_API_KEY_AQUI') {
            return ['success' => false, 'error' => 'WhatsApp Business API no configurada'];
        }
        
        $url = "https://graph.facebook.com/v17.0/{$this->instanceId}/messages";
        
        $data = [
            'messaging_product' => 'whatsapp',
            'to' => $this->phoneNumber,
            'type' => 'text',
            'text' => [
                'body' => $message
            ]
        ];
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $this->apiKey,
            'Content-Type: application/json'
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($httpCode === 200) {
            return ['success' => true, 'method' => 'WhatsApp Business API'];
        } else {
            return ['success' => false, 'error' => 'Business API error: ' . $response];
        }
    }
    
    /**
     * Método 2: WhatsApp API de terceros (más fácil)
     */
    private function sendWithThirdPartyAPI($message) {
        if ($this->apiKey === 'TU_API_KEY_AQUI') {
            return ['success' => false, 'error' => 'API de terceros no configurada'];
        }
        
        // Ejemplo con WhatsApp API de terceros (como WATI, 360Dialog, etc.)
        $url = "https://api.whatsapp.com/send";
        
        $data = [
            'token' => $this->apiKey,
            'to' => $this->phoneNumber,
            'body' => $message
        ];
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($httpCode === 200) {
            return ['success' => true, 'method' => 'Third Party API'];
        } else {
            return ['success' => false, 'error' => 'Third party API error: ' . $response];
        }
    }
    
    /**
     * Método 3: Webhook que envía a WhatsApp (más simple)
     */
    private function sendWithWebhook($message) {
        if ($this->apiKey === 'TU_API_KEY_AQUI') {
            return ['success' => false, 'error' => 'Webhook no configurado'];
        }
        
        $data = [
            'message' => $message,
            'phone' => $this->phoneNumber,
            'source' => 'fosforoweb.com.ar'
        ];
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->apiKey);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($httpCode >= 200 && $httpCode < 300) {
            return ['success' => true, 'method' => 'Webhook'];
        } else {
            return ['success' => false, 'error' => 'Webhook error: ' . $response];
        }
    }
    
    /**
     * Envía mensaje usando el mejor método disponible
     */
    private function sendMessage($message) {
        // Intentar diferentes métodos en orden de preferencia
        
        // Método 1: WhatsApp Business API
        $result = $this->sendWithBusinessAPI($message);
        if ($result['success']) {
            return $result;
        }
        
        // Método 2: API de terceros
        $result = $this->sendWithThirdPartyAPI($message);
        if ($result['success']) {
            return $result;
        }
        
        // Método 3: Webhook
        $result = $this->sendWithWebhook($message);
        if ($result['success']) {
            return $result;
        }
        
        // Si todos fallan
        return ['success' => false, 'error' => 'Todos los métodos fallaron'];
    }
    
    /**
     * Envía un mensaje de prueba
     */
    public function sendTestMessage() {
        $text = "🧪 *Prueba de WhatsApp*\n\n";
        $text .= "El sistema de contactos de Fosforo Web está funcionando correctamente.\n";
        $text .= "📅 " . date('d/m/Y H:i:s');
        
        return $this->sendMessage($text);
    }
}
?>
