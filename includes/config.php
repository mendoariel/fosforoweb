<?php
// Detectar entorno automáticamente
$isDocker = getenv('DOCKER_CONTAINER') === 'true' || $_SERVER['HTTP_HOST'] === 'localhost:8080';
$isProduction = $_SERVER['HTTP_HOST'] === 'fosforoweb.com.ar';

if ($isDocker) {
    // Entorno Docker/Local
    define('DB_HOST', 'db');
    define('DB_USER', 'fosforo');
    define('DB_PASS', 'fosforo123');
    define('DB_NAME', 'fosforo_local');
    define('SITE_URL', 'http://localhost:8080');
    define('DEBUG_MODE', true);
} else {
    // Entorno de producción
    define('DB_HOST', '172.17.151.103');
    define('DB_USER', 'a0020600_fosforo');
    define('DB_PASS', 'mefaKizu18');
    define('DB_NAME', 'a0020600_fosforo');
    define('SITE_URL', 'https://fosforoweb.com.ar');
    define('DEBUG_MODE', false);
}

// Configuración del sitio
define('SITE_NAME', 'Fosforo Web');
define('SITE_EMAIL', 'info@fosforoweb.com.ar');

// Configuración de seguridad
define('SECRET_KEY', 'tu_clave_secreta_aqui');
define('ADMIN_EMAIL', 'admin@fosforoweb.com.ar');

// Configuración de archivos
define('UPLOAD_PATH', 'assets/uploads/');
define('MAX_FILE_SIZE', 5 * 1024 * 1024); // 5MB

// Configuración de email
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USER', 'tu_email@gmail.com');
define('SMTP_PASS', 'tu_password');

// Configuración de desarrollo
define('LOG_ERRORS', true);
?>
