<?php
/**
 * Servicio de Email Externo para Fosforo Web
 * Compatible con SendGrid, Mailgun, y otros servicios
 */

class ExternalEmailService {
    private $service;
    private $apiKey;
    private $fromEmail;
    private $fromName;
    private $toEmail;
    
    public function __construct($service = 'sendgrid') {
        $this->service = $service;
        $this->fromEmail = 'noreply@fosforoweb.com.ar';
        $this->fromName = 'Fosforo Web';
        $this->toEmail = 'albertdesarrolloweb@gmail.com';
        
        // Configurar API Key según el servicio
        switch($service) {
            case 'sendgrid':
                $this->apiKey = 'TU_SENDGRID_API_KEY_AQUI';
                break;
            case 'mailgun':
                $this->apiKey = 'TU_MAILGUN_API_KEY_AQUI';
                break;
            case 'webhook':
                $this->apiKey = 'TU_WEBHOOK_URL_AQUI';
                break;
        }
    }
    
    /**
     * Envía email usando el servicio configurado
     */
    public function sendContactEmail($name, $email, $phone, $message) {
        switch($this->service) {
            case 'sendgrid':
                return $this->sendWithSendGrid($name, $email, $phone, $message);
            case 'mailgun':
                return $this->sendWithMailgun($name, $email, $phone, $message);
            case 'webhook':
                return $this->sendWithWebhook($name, $email, $phone, $message);
            default:
                return $this->sendWithWebhook($name, $email, $phone, $message);
        }
    }
    
    /**
     * SendGrid - Servicio profesional de email
     */
    private function sendWithSendGrid($name, $email, $phone, $message) {
        if ($this->apiKey === 'TU_SENDGRID_API_KEY_AQUI') {
            return ['success' => false, 'error' => 'SendGrid API Key no configurada'];
        }
        
        $data = [
            'personalizations' => [
                [
                    'to' => [
                        ['email' => $this->toEmail, 'name' => 'Alberto']
                    ],
                    'subject' => 'Nuevo mensaje de contacto - Fosforo Web'
                ]
            ],
            'from' => [
                'email' => $this->fromEmail,
                'name' => $this->fromName
            ],
            'reply_to' => [
                'email' => $email,
                'name' => $name
            ],
            'subject' => 'Nuevo mensaje de contacto - Fosforo Web',
            'content' => [
                [
                    'type' => 'text/html',
                    'value' => $this->createEmailTemplate($name, $email, $phone, $message)
                ]
            ]
        ];
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.sendgrid.com/v3/mail/send');
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
        
        if ($httpCode === 202) {
            return ['success' => true, 'method' => 'SendGrid'];
        } else {
            return ['success' => false, 'error' => 'SendGrid error: ' . $response];
        }
    }
    
    /**
     * Mailgun - Servicio alternativo de email
     */
    private function sendWithMailgun($name, $email, $phone, $message) {
        if ($this->apiKey === 'TU_MAILGUN_API_KEY_AQUI') {
            return ['success' => false, 'error' => 'Mailgun API Key no configurada'];
        }
        
        $data = [
            'from' => $this->fromName . ' <' . $this->fromEmail . '>',
            'to' => $this->toEmail,
            'subject' => 'Nuevo mensaje de contacto - Fosforo Web',
            'html' => $this->createEmailTemplate($name, $email, $phone, $message),
            'h:Reply-To' => $name . ' <' . $email . '>'
        ];
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v3/YOUR_DOMAIN.mailgun.org/messages');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_USERPWD, 'api:' . $this->apiKey);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($httpCode === 200) {
            return ['success' => true, 'method' => 'Mailgun'];
        } else {
            return ['success' => false, 'error' => 'Mailgun error: ' . $response];
        }
    }
    
    /**
     * Webhook - Envía datos a un servicio externo (Zapier, IFTTT, etc.)
     */
    private function sendWithWebhook($name, $email, $phone, $message) {
        if ($this->apiKey === 'TU_WEBHOOK_URL_AQUI') {
            return ['success' => false, 'error' => 'Webhook URL no configurada'];
        }
        
        $data = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone ?: 'No proporcionado',
            'message' => $message,
            'timestamp' => date('Y-m-d H:i:s'),
            'source' => 'fosforoweb.com.ar',
            'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown'
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
     * Crea el template HTML del email
     */
    private function createEmailTemplate($name, $email, $phone, $message) {
        return "
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset='UTF-8'>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; }
                .container { max-width: 600px; margin: 0 auto; background: #ffffff; }
                .header { background: linear-gradient(135deg, #007bff, #0056b3); color: white; padding: 30px; text-align: center; }
                .content { padding: 30px; background: #f8f9fa; }
                .field { margin: 20px 0; padding: 15px; background: white; border-radius: 8px; border-left: 4px solid #007bff; }
                .label { font-weight: bold; color: #495057; display: block; margin-bottom: 5px; }
                .value { color: #212529; }
                .message-field { background: #e3f2fd; padding: 20px; border-radius: 8px; margin: 20px 0; }
                .footer { padding: 20px; text-align: center; background: #6c757d; color: white; font-size: 12px; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h1>📧 Nuevo Mensaje de Contacto</h1>
                    <p>Fosforo Web - Sistema de Contacto</p>
                </div>
                
                <div class='content'>
                    <div class='field'>
                        <span class='label'>👤 Nombre:</span>
                        <span class='value'>{$name}</span>
                    </div>
                    
                    <div class='field'>
                        <span class='label'>📧 Email:</span>
                        <span class='value'>{$email}</span>
                    </div>
                    
                    <div class='field'>
                        <span class='label'>📱 Teléfono:</span>
                        <span class='value'>" . ($phone ?: 'No proporcionado') . "</span>
                    </div>
                    
                    <div class='field'>
                        <span class='label'>💬 Mensaje:</span>
                        <div class='message-field'>
                            " . nl2br(htmlspecialchars($message)) . "
                        </div>
                    </div>
                    
                    <div class='field'>
                        <span class='label'>📅 Fecha y Hora:</span>
                        <span class='value'>" . date('d/m/Y H:i:s') . " (Argentina)</span>
                    </div>
                    
                    <div class='field'>
                        <span class='label'>🌐 Dirección IP:</span>
                        <span class='value'>" . ($_SERVER['REMOTE_ADDR'] ?? 'No disponible') . "</span>
                    </div>
                </div>
                
                <div class='footer'>
                    <p>Este mensaje fue enviado desde el formulario de contacto de <strong>Fosforo Web</strong></p>
                    <p>Puedes responder directamente a este email para contactar al cliente</p>
                    <p>🔗 <a href='https://fosforoweb.com.ar' style='color: #ffffff;'>fosforoweb.com.ar</a></p>
                </div>
            </div>
        </body>
        </html>
        ";
    }
}
?>
