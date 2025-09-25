<?php
// Configurar headers para JSON
header('Content-Type: application/json');

// Verificar que sea una petición POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
    exit;
}

// Función para validar email
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Función para sanitizar datos
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

try {
    // Obtener y validar datos del formulario
    $name = isset($_POST['name']) ? sanitizeInput($_POST['name']) : '';
    $email = isset($_POST['email']) ? sanitizeInput($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? sanitizeInput($_POST['phone']) : '';
    $message = isset($_POST['message']) ? sanitizeInput($_POST['message']) : '';
    
    // Validaciones básicas
    $errors = [];
    
    if (empty($name)) {
        $errors[] = 'El nombre es requerido';
    }
    
    if (empty($email)) {
        $errors[] = 'El email es requerido';
    } elseif (!isValidEmail($email)) {
        $errors[] = 'El email no es válido';
    }
    
    if (empty($message)) {
        $errors[] = 'El mensaje es requerido';
    }
    
    if (!empty($errors)) {
        echo json_encode(['success' => false, 'message' => implode(', ', $errors)]);
        exit;
    }
    
    // Intentar conectar a la base de datos
    $dbSuccess = false;
    try {
        // Configuración de base de datos
        $dbHost = 'localhost';
        $dbUser = 'a0020600_mendo';
        $dbPass = 'Fosforo1234';
        $dbName = 'a0020600_fosforo';
        
        $conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Crear tabla de contactos si no existe
        $createTable = "CREATE TABLE IF NOT EXISTS contacts (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL,
            phone VARCHAR(20),
            message TEXT NOT NULL,
            ip_address VARCHAR(45),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        $conn->exec($createTable);
        
        // Insertar el contacto en la base de datos
        $stmt = $conn->prepare("INSERT INTO contacts (name, email, phone, message, ip_address) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$name, $email, $phone, $message, $_SERVER['REMOTE_ADDR'] ?? 'unknown']);
        
        $dbSuccess = true;
        error_log("Contacto guardado en BD: {$name} ({$email})");
        
    } catch(PDOException $e) {
        error_log("Error de BD en contacto: " . $e->getMessage());
    }
    
    // Guardar en archivo como respaldo
    $backupFile = 'contacts_' . date('Y-m') . '.txt';
    $backupData = [
        'timestamp' => date('Y-m-d H:i:s'),
        'name' => $name,
        'email' => $email,
        'phone' => $phone ?: 'No proporcionado',
        'message' => $message,
        'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown'
    ];
    
    $line = implode(' | ', $backupData) . "\n";
    file_put_contents($backupFile, $line, FILE_APPEND | LOCK_EX);
    error_log("Contacto guardado en archivo: {$name} ({$email})");
    
    // Enviar email
    $to = 'info@fosforoweb.com.ar';
    $subject = "Nuevo mensaje de contacto - Fosforo Web";
    $emailMessage = "
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background: #007bff; color: white; padding: 20px; text-align: center; }
            .content { padding: 20px; background: #f8f9fa; }
            .field { margin: 10px 0; padding: 15px; background: white; border-radius: 8px; border-left: 4px solid #007bff; }
            .label { font-weight: bold; color: #495057; display: block; margin-bottom: 5px; }
            .value { color: #212529; }
            .footer { padding: 20px; text-align: center; background: #6c757d; color: white; font-size: 12px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>📧 Nuevo Mensaje de Contacto</h2>
                <p>Fosforo Web</p>
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
                    <div class='value' style='margin-top: 10px; padding: 15px; background: white; border-left: 4px solid #007bff;'>
                        " . nl2br($message) . "
                    </div>
                </div>
                <div class='field'>
                    <span class='label'>📅 Fecha:</span>
                    <span class='value'>" . date('d/m/Y H:i:s') . "</span>
                </div>
                <div class='field'>
                    <span class='label'>🌐 IP:</span>
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
    
    $headers = [
        'MIME-Version: 1.0',
        'Content-type: text/html; charset=UTF-8',
        'From: Fosforo Web <noreply@fosforoweb.com.ar>',
        'Reply-To: ' . $name . ' <' . $email . '>',
        'X-Mailer: PHP/' . phpversion()
    ];
    
    $emailSent = @mail($to, $subject, $emailMessage, implode("\r\n", $headers));
    
    if ($emailSent) {
        error_log("Email enviado exitosamente a {$to}");
    } else {
        error_log("Error al enviar email a {$to}");
    }
    
    // Respuesta exitosa
    echo json_encode([
        'success' => true, 
        'message' => 'Mensaje enviado correctamente. Te contactaremos pronto.',
        'debug' => 'Procesado correctamente - BD: ' . ($dbSuccess ? 'OK' : 'Error') . ', Email: ' . ($emailSent ? 'OK' : 'Error')
    ]);
    
} catch (Exception $e) {
    error_log("Error general en contacto: " . $e->getMessage());
    echo json_encode([
        'success' => false, 
        'message' => 'Hubo un error al procesar tu mensaje. Inténtalo de nuevo.',
        'debug' => 'Error: ' . $e->getMessage()
    ]);
}
?>
