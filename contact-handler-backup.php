<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

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
    $conn = null;
    try {
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Crear tabla de contactos si no existe
        $createTable = "CREATE TABLE IF NOT EXISTS contacts (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL,
            phone VARCHAR(20),
            message TEXT NOT NULL,
            status ENUM('new', 'read', 'replied', 'closed') DEFAULT 'new',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        $conn->exec($createTable);
        
        // Insertar el contacto en la base de datos
        $stmt = $conn->prepare("INSERT INTO contacts (name, email, phone, message) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $email, $phone, $message]);
        
        // Enviar email de notificación (opcional)
        $to = 'albertdesarrolloweb@gmail.com';
        $subject = "Nuevo mensaje de contacto - " . SITE_NAME;
        $emailMessage = "
        <h2>Nuevo mensaje de contacto</h2>
        <p><strong>Nombre:</strong> {$name}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Teléfono:</strong> {$phone}</p>
        <p><strong>Mensaje:</strong></p>
        <p>{$message}</p>
        <hr>
        <p><small>Enviado desde " . SITE_URL . " el " . date('Y-m-d H:i:s') . "</small></p>
        ";
        
        $headers = [
            'MIME-Version: 1.0',
            'Content-type: text/html; charset=UTF-8',
            'From: ' . SITE_NAME . ' <noreply@fosforoweb.com.ar>',
            'Reply-To: ' . $email,
            'X-Mailer: PHP/' . phpversion()
        ];
        
        // Intentar enviar email (puede fallar en entorno local)
        $emailSent = @mail($to, $subject, $emailMessage, implode("\r\n", $headers));
        
        // Log del contacto (para debugging)
        error_log("Nuevo contacto: {$name} ({$email}) - " . date('Y-m-d H:i:s'));
        
        echo json_encode([
            'success' => true, 
            'message' => 'Mensaje enviado correctamente. Te contactaremos pronto.'
        ]);
        
    } catch(PDOException $e) {
        // Si falla la base de datos, al menos intentar enviar email
        error_log("Error de BD en contacto: " . $e->getMessage());
        
        // Intentar enviar email como respaldo
        $to = 'albertdesarrolloweb@gmail.com';
        $subject = "Nuevo mensaje de contacto - " . SITE_NAME;
        $emailMessage = "
        <h2>Nuevo mensaje de contacto (Sin BD)</h2>
        <p><strong>Nombre:</strong> {$name}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Teléfono:</strong> {$phone}</p>
        <p><strong>Mensaje:</strong></p>
        <p>{$message}</p>
        <hr>
        <p><small>Enviado desde " . SITE_URL . " el " . date('Y-m-d H:i:s') . "</small></p>
        ";
        
        $headers = [
            'MIME-Version: 1.0',
            'Content-type: text/html; charset=UTF-8',
            'From: ' . SITE_NAME . ' <noreply@fosforoweb.com.ar>',
            'Reply-To: ' . $email,
            'X-Mailer: PHP/' . phpversion()
        ];
        
        $emailSent = @mail($to, $subject, $emailMessage, implode("\r\n", $headers));
        
        echo json_encode([
            'success' => true, 
            'message' => 'Mensaje recibido. Te contactaremos pronto.'
        ]);
    }
    
} catch (Exception $e) {
    error_log("Error general en contacto: " . $e->getMessage());
    echo json_encode([
        'success' => false, 
        'message' => 'Hubo un error al procesar tu mensaje. Inténtalo de nuevo.'
    ]);
} finally {
    if ($conn) {
        $conn = null;
    }
}
?>
