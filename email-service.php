<?php
/**
 * Servicio de Email para Fosforo Web
 * Maneja el envío de emails usando diferentes métodos según la disponibilidad
 */

class EmailService {
    private $to;
    private $from;
    private $fromName;
    
    public function __construct($to = 'albertdesarrolloweb@gmail.com') {
        $this->to = $to;
        $this->from = 'noreply@fosforoweb.com.ar';
        $this->fromName = 'Fosforo Web';
    }
    
    /**
     * Envía un email usando el mejor método disponible
     */
    public function sendContactEmail($name, $email, $phone, $message) {
        $subject = "Nuevo mensaje de contacto - Fosforo Web";
        $htmlMessage = $this->createContactEmailTemplate($name, $email, $phone, $message);
        
        // Método 1: mail() nativo
        if ($this->sendWithMail($subject, $htmlMessage, $email, $name)) {
            return ['success' => true, 'method' => 'mail()'];
        }
        
        // Método 2: Guardar en archivo como respaldo
        $this->saveToFile($name, $email, $phone, $message);
        
        // Método 3: Enviar notificación webhook (para servicios externos)
        $this->sendWebhook($name, $email, $phone, $message);
        
        return ['success' => true, 'method' => 'backup', 'message' => 'Datos guardados correctamente'];
    }
    
    /**
     * Método 1: mail() nativo de PHP
     */
    private function sendWithMail($subject, $message, $replyTo, $replyName) {
        $headers = [
            'MIME-Version: 1.0',
            'Content-type: text/html; charset=UTF-8',
            'From: ' . $this->fromName . ' <' . $this->from . '>',
            'Reply-To: ' . $replyName . ' <' . $replyTo . '>',
            'X-Mailer: PHP/' . phpversion()
        ];
        
        return @mail($this->to, $subject, $message, implode("\r\n", $headers));
    }
    
    /**
     * Método 2: Guardar en archivo como respaldo
     */
    private function saveToFile($name, $email, $phone, $message) {
        $filename = 'contacts_' . date('Y-m') . '.txt';
        $data = [
            'timestamp' => date('Y-m-d H:i:s'),
            'name' => $name,
            'email' => $email,
            'phone' => $phone ?: 'No proporcionado',
            'message' => $message,
            'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown'
        ];
        
        $line = implode(' | ', $data) . "\n";
        file_put_contents($filename, $line, FILE_APPEND | LOCK_EX);
        
        error_log("Contacto guardado en archivo: {$name} ({$email})");
    }
    
    /**
     * Método 3: Webhook para servicios externos
     */
    private function sendWebhook($name, $email, $phone, $message) {
        // Aquí puedes configurar un webhook a un servicio como Zapier, IFTTT, etc.
        $webhookData = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'message' => $message,
            'timestamp' => date('Y-m-d H:i:s'),
            'source' => 'fosforoweb.com.ar'
        ];
        
        // Ejemplo de webhook (descomenta y configura si tienes uno)
        /*
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'TU_WEBHOOK_URL_AQUI');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($webhookData));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        
        $result = curl_exec($ch);
        curl_close($ch);
        
        error_log("Webhook enviado: " . $result);
        */
    }
    
    /**
     * Crea el template HTML para el email
     */
    private function createContactEmailTemplate($name, $email, $phone, $message) {
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
                .highlight { background: #fff3cd; padding: 2px 4px; border-radius: 3px; }
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
                        <span class='value'>{$this->getFormattedDate()}</span>
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
    
    private function getFormattedDate() {
        $date = new DateTime();
        $date->setTimezone(new DateTimeZone('America/Argentina/Buenos_Aires'));
        return $date->format('d/m/Y H:i:s') . ' (Argentina)';
    }
}
?>
