<?php
/**
 * Panel de Administración de Contactos
 * Muestra todos los contactos recibidos
 */

// Protección básica - cambia esta contraseña
$admin_password = 'fosforo123';

// Verificar autenticación
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    if (isset($_POST['password']) && $_POST['password'] === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
    } else {
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin - Fosforo Web</title>
            <style>
                body { font-family: Arial, sans-serif; background: #f5f5f5; margin: 0; padding: 20px; }
                .login-form { max-width: 400px; margin: 100px auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
                .login-form h2 { text-align: center; color: #333; margin-bottom: 30px; }
                .form-group { margin-bottom: 20px; }
                .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
                .form-group input { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
                .btn { background: #007bff; color: white; padding: 12px 30px; border: none; border-radius: 5px; cursor: pointer; width: 100%; font-size: 16px; }
                .btn:hover { background: #0056b3; }
            </style>
        </head>
        <body>
            <div class="login-form">
                <h2>🔐 Admin - Fosforo Web</h2>
                <form method="POST">
                    <div class="form-group">
                        <label>Contraseña:</label>
                        <input type="password" name="password" required>
                    </div>
                    <button type="submit" class="btn">Acceder</button>
                </form>
            </div>
        </body>
        </html>
        <?php
        exit;
    }
}

// Función para obtener contactos de la base de datos
function getContactsFromDB() {
    $contacts = [];
    try {
        require_once 'includes/config.php';
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $conn->prepare("SELECT * FROM contacts ORDER BY created_at DESC");
        $stmt->execute();
        $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    } catch (Exception $e) {
        error_log("Error obteniendo contactos de BD: " . $e->getMessage());
    }
    return $contacts;
}

// Función para obtener contactos de archivos
function getContactsFromFiles() {
    $contacts = [];
    $files = glob('contacts_*.txt');
    
    foreach ($files as $file) {
        $lines = file($file, FILE_IGNORE_NEW_LINES);
        foreach ($lines as $line) {
            $parts = explode(' | ', $line);
            if (count($parts) >= 6) {
                $contacts[] = [
                    'timestamp' => $parts[0],
                    'name' => $parts[1],
                    'email' => $parts[2],
                    'phone' => $parts[3],
                    'message' => $parts[4],
                    'ip' => $parts[5],
                    'source' => 'file'
                ];
            }
        }
    }
    
    // Ordenar por fecha (más recientes primero)
    usort($contacts, function($a, $b) {
        return strtotime($b['timestamp']) - strtotime($a['timestamp']);
    });
    
    return $contacts;
}

// Obtener contactos
$dbContacts = getContactsFromDB();
$fileContacts = getContactsFromFiles();
$allContacts = array_merge($dbContacts, $fileContacts);

// Ordenar todos por fecha
usort($allContacts, function($a, $b) {
    $dateA = isset($a['created_at']) ? $a['created_at'] : $a['timestamp'];
    $dateB = isset($b['created_at']) ? $b['created_at'] : $b['timestamp'];
    return strtotime($dateB) - strtotime($dateA);
});

// Estadísticas
$totalContacts = count($allContacts);
$todayContacts = 0;
$today = date('Y-m-d');

foreach ($allContacts as $contact) {
    $date = isset($contact['created_at']) ? $contact['created_at'] : $contact['timestamp'];
    if (strpos($date, $today) === 0) {
        $todayContacts++;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Contactos - Fosforo Web</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f5f5; margin: 0; padding: 20px; }
        .header { background: white; padding: 20px; border-radius: 10px; margin-bottom: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .stats { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 20px; }
        .stat-card { background: white; padding: 20px; border-radius: 10px; text-align: center; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .stat-number { font-size: 2em; font-weight: bold; color: #007bff; }
        .stat-label { color: #666; margin-top: 5px; }
        .contacts-table { background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .table-header { background: #007bff; color: white; padding: 15px; }
        .contact-item { border-bottom: 1px solid #eee; padding: 15px; }
        .contact-item:last-child { border-bottom: none; }
        .contact-header { display: flex; justify-content: between; align-items: center; margin-bottom: 10px; }
        .contact-name { font-weight: bold; color: #333; }
        .contact-date { color: #666; font-size: 0.9em; }
        .contact-email { color: #007bff; text-decoration: none; }
        .contact-message { background: #f8f9fa; padding: 10px; border-radius: 5px; margin-top: 10px; }
        .contact-meta { display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 10px; margin-top: 10px; font-size: 0.9em; color: #666; }
        .logout-btn { background: #dc3545; color: white; padding: 8px 15px; border: none; border-radius: 5px; cursor: pointer; text-decoration: none; display: inline-block; }
        .logout-btn:hover { background: #c82333; }
        .no-contacts { text-align: center; padding: 40px; color: #666; }
    </style>
</head>
<body>
    <div class="header">
        <h1>📧 Admin Contactos - Fosforo Web</h1>
        <p>Panel de administración de mensajes de contacto</p>
        <a href="?logout=1" class="logout-btn">Cerrar Sesión</a>
    </div>

    <div class="stats">
        <div class="stat-card">
            <div class="stat-number"><?php echo $totalContacts; ?></div>
            <div class="stat-label">Total Contactos</div>
        </div>
        <div class="stat-card">
            <div class="stat-number"><?php echo $todayContacts; ?></div>
            <div class="stat-label">Hoy</div>
        </div>
        <div class="stat-card">
            <div class="stat-number"><?php echo count($dbContacts); ?></div>
            <div class="stat-label">En Base de Datos</div>
        </div>
        <div class="stat-card">
            <div class="stat-number"><?php echo count($fileContacts); ?></div>
            <div class="stat-label">En Archivos</div>
        </div>
    </div>

    <div class="contacts-table">
        <div class="table-header">
            <h2>📋 Lista de Contactos</h2>
        </div>
        
        <?php if (empty($allContacts)): ?>
            <div class="no-contacts">
                <h3>📭 No hay contactos aún</h3>
                <p>Los mensajes de contacto aparecerán aquí cuando lleguen.</p>
            </div>
        <?php else: ?>
            <?php foreach ($allContacts as $contact): ?>
                <div class="contact-item">
                    <div class="contact-header">
                        <div class="contact-name"><?php echo htmlspecialchars($contact['name']); ?></div>
                        <div class="contact-date">
                            <?php 
                            $date = isset($contact['created_at']) ? $contact['created_at'] : $contact['timestamp'];
                            echo date('d/m/Y H:i', strtotime($date));
                            ?>
                        </div>
                    </div>
                    
                    <div class="contact-meta">
                        <div><strong>📧 Email:</strong> <a href="mailto:<?php echo htmlspecialchars($contact['email']); ?>" class="contact-email"><?php echo htmlspecialchars($contact['email']); ?></a></div>
                        <div><strong>📱 Teléfono:</strong> <?php echo htmlspecialchars($contact['phone']); ?></div>
                        <div><strong>🌐 IP:</strong> <?php echo htmlspecialchars($contact['ip']); ?></div>
                        <div><strong>💾 Fuente:</strong> <?php echo isset($contact['source']) ? $contact['source'] : 'Base de Datos'; ?></div>
                    </div>
                    
                    <div class="contact-message">
                        <strong>💬 Mensaje:</strong><br>
                        <?php echo nl2br(htmlspecialchars($contact['message'])); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
// Manejar logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: admin-contactos.php');
    exit;
}
?>
