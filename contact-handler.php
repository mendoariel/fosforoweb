<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';
require_once 'email-service.php';

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
    
    // Preparar datos para almacenar
    $contactData = [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'message' => $message,
        'timestamp' => date('Y-m-d H:i:s'),
        'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown'
    ];
    
    // Intentar conectar a la base de datos y almacenar
    $dbSuccess = false;
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
            ip_address VARCHAR(45),
            status ENUM('new', 'read', 'replied', 'closed') DEFAULT 'new',
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
    
    
    // Usar el servicio de email mejorado
    $emailService = new EmailService('albertdesarrolloweb@gmail.com');
    $emailResult = $emailService->sendContactEmail($name, $email, $phone, $message);
    
    if ($emailResult['success']) {
        error_log("Contacto procesado exitosamente usando: " . $emailResult['method']);
        echo json_encode([
            'success' => true, 
            'message' => 'Mensaje enviado correctamente. Te contactaremos pronto.',
            'debug' => 'Procesado con ' . $emailResult['method']
        ]);
    } else {
        echo json_encode([
            'success' => false, 
            'message' => 'Hubo un error al procesar tu mensaje. Inténtalo de nuevo.',
            'debug' => 'Error en el servicio de email'
        ]);
    }
    
} catch (Exception $e) {
    error_log("Error general en contacto: " . $e->getMessage());
    echo json_encode([
        'success' => false, 
        'message' => 'Hubo un error al procesar tu mensaje. Inténtalo de nuevo.',
        'debug' => 'Error: ' . $e->getMessage()
    ]);
} finally {
    if (isset($conn)) {
        $conn = null;
    }
}
?>
