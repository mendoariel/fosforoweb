<?php
// Configuración de la base de datos
define('DB_HOST', 'localhost');
define('DB_USER', 'a0020600');
define('DB_PASS', 'mefaKlzu18');
define('DB_NAME', 'a0020600_fosforo');

// Configuración del sitio
define('SITE_NAME', 'Fosforo Web');
define('SITE_URL', 'https://fosforoweb.com.ar');
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
define('DEBUG_MODE', true);
define('LOG_ERRORS', true);
?>
