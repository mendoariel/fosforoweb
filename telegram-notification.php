<?php
/**
 * Sistema de Notificaciones por Telegram
 * Envía notificaciones a un chat de Telegram cuando llega un contacto
 */

class TelegramNotificationService {
    private $botToken;
    private $chatId;
    
    public function __construct($botToken = null, $chatId = null) {
        // Configura estos valores con tu bot de Telegram
        $this->botToken = $botToken ?: 'TU_BOT_TOKEN_AQUI';
        $this->chatId = $chatId ?: 'TU_CHAT_ID_AQUI';
    }
    
    /**
     * Envía notificación de nuevo contacto
     */
    public function sendContactNotification($name, $email, $phone, $message) {
        if ($this->botToken === 'TU_BOT_TOKEN_AQUI' || $this->chatId === 'TU_CHAT_ID_AQUI') {
            return ['success' => false, 'error' => 'Telegram no configurado'];
        }
        
        $text = "🆕 *Nuevo Mensaje de Contacto*\n\n";
        $text .= "👤 *Nombre:* {$name}\n";
        $text .= "📧 *Email:* {$email}\n";
        $text .= "📱 *Teléfono:* " . ($phone ?: 'No proporcionado') . "\n";
        $text .= "💬 *Mensaje:*\n" . $message . "\n\n";
        $text .= "📅 *Fecha:* " . date('d/m/Y H:i:s') . "\n";
        $text .= "🌐 *IP:* " . ($_SERVER['REMOTE_ADDR'] ?? 'No disponible') . "\n";
        $text .= "🔗 *Fuente:* fosforoweb.com.ar";
        
        return $this->sendMessage($text);
    }
    
    /**
     * Envía mensaje a Telegram
     */
    private function sendMessage($text) {
        $url = "https://api.telegram.org/bot{$this->botToken}/sendMessage";
        
        $data = [
            'chat_id' => $this->chatId,
            'text' => $text,
            'parse_mode' => 'Markdown',
            'disable_web_page_preview' => true
        ];
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);
        
        if ($error) {
            error_log("Telegram error: " . $error);
            return ['success' => false, 'error' => $error];
        }
        
        if ($httpCode === 200) {
            $responseData = json_decode($response, true);
            if ($responseData['ok']) {
                error_log("Telegram notification sent successfully");
                return ['success' => true, 'message_id' => $responseData['result']['message_id']];
            } else {
                error_log("Telegram API error: " . $responseData['description']);
                return ['success' => false, 'error' => $responseData['description']];
            }
        } else {
            error_log("Telegram HTTP error: $httpCode - $response");
            return ['success' => false, 'error' => "HTTP $httpCode: $response"];
        }
    }
    
    /**
     * Envía un mensaje de prueba
     */
    public function sendTestMessage() {
        $text = "🧪 *Prueba de Notificación*\n\n";
        $text .= "El sistema de contactos de Fosforo Web está funcionando correctamente.\n";
        $text .= "📅 " . date('d/m/Y H:i:s');
        
        return $this->sendMessage($text);
    }
    
    /**
     * Obtiene información del bot
     */
    public function getBotInfo() {
        if ($this->botToken === 'TU_BOT_TOKEN_AQUI') {
            return ['success' => false, 'error' => 'Bot token no configurado'];
        }
        
        $url = "https://api.telegram.org/bot{$this->botToken}/getMe";
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($httpCode === 200) {
            $data = json_decode($response, true);
            return ['success' => true, 'bot_info' => $data];
        } else {
            return ['success' => false, 'error' => "HTTP $httpCode: $response"];
        }
    }
}
?>
