<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

// Iniciar sesión si no está iniciada
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? 'Fosforo Web'; ?> - Encendemos tu presencia online</title>
    <meta name="description" content="<?php echo $page_description ?? 'Servicios profesionales de desarrollo web, marketing digital y presencia online.'; ?>">
    
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/admin.css">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">
    
    <!-- Meta tags adicionales -->
    <meta property="og:title" content="<?php echo $page_title ?? 'Fosforo Web'; ?>">
    <meta property="og:description" content="<?php echo $page_description ?? 'Servicios profesionales de desarrollo web'; ?>">
    <meta property="og:url" content="<?php echo SITE_URL . $_SERVER['REQUEST_URI']; ?>">
    
    <!-- CSRF Token para formularios -->
    <meta name="csrf-token" content="<?php echo generateCSRFToken(); ?>">
</head>
<body>
    <!-- Navegación -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <a href="index.php">Fosforo Web</a>
            </div>
            <div class="nav-menu">
                <a href="index.php" class="nav-link">Inicio</a>
                <a href="servicios.php" class="nav-link">Servicios</a>
                <a href="portfolio.php" class="nav-link">Portfolio</a>
                <a href="contacto.php" class="nav-link">Contacto</a>
                <a href="blog/" class="nav-link">Blog</a>
            </div>
            <div class="nav-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <!-- Mensajes del sistema -->
    <?php
    $message = getMessage();
    if($message): ?>
        <div class="alert alert-<?php echo $message['type']; ?>">
            <?php echo $message['message']; ?>
        </div>
    <?php endif; ?>

    <!-- Contenido principal -->
    <main class="main-content">
