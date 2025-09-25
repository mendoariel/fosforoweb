<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

// Obtener servicios de la base de datos
$services = [];
try {
    $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM services WHERE active = 1 ORDER BY id ASC LIMIT 6");
    $stmt->execute();
    $services = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    // Error de conexión - usar servicios por defecto
    $services = [
        ['title' => 'Diseño Web', 'description' => 'Sitios web profesionales y responsivos', 'price' => 50000],
        ['title' => 'Marketing Digital', 'description' => 'Estrategias de marketing online', 'price' => 30000],
        ['title' => 'SEO', 'description' => 'Optimización para motores de búsqueda', 'price' => 25000],
        ['title' => 'Códigos QR Innovadores', 'description' => 'QR personalizados con diseño único y efectos visuales', 'price' => 15000]
    ];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Título actualizado - v2.0 -->
    <title>Fosforo Web - Encendemos tu presencia online</title>
    
    <!-- Meta Description -->
    <meta name="description" content="Fosforo Web - Soluciones digitales profesionales. Diseño web, marketing digital, SEO y códigos QR innovadores. Encendemos tu presencia online en Mendoza, Argentina.">
    
    <!-- Meta Keywords -->
    <meta name="keywords" content="diseño web, marketing digital, SEO, códigos QR, desarrollo web, Mendoza, Argentina, presencia online">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://fosforoweb.com.ar/">
    <meta property="og:title" content="Fosforo Web - Encendemos tu presencia online">
    <meta property="og:description" content="Soluciones digitales profesionales. Diseño web, marketing digital, SEO y códigos QR innovadores.">
    <meta property="og:image" content="https://fosforoweb.com.ar/assets/images/qr-logo-fosforo.svg">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://fosforoweb.com.ar/">
    <meta property="twitter:title" content="Fosforo Web - Encendemos tu presencia online">
    <meta property="twitter:description" content="Soluciones digitales profesionales. Diseño web, marketing digital, SEO y códigos QR innovadores.">
    <meta property="twitter:image" content="https://fosforoweb.com.ar/assets/images/qr-logo-fosforo.svg">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="favicon.ico?v=2">
    <link rel="icon" type="image/svg+xml" href="favicon.svg?v=2">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon.svg?v=2">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon.svg?v=2">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon.svg?v=2">
    <link rel="shortcut icon" href="favicon.ico?v=2">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/css/style-modern.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <nav class="navbar">
            <div class="nav-container">
                <div class="nav-logo">
                    <a href="#inicio" class="nav-logo-link">
                        <img src="assets/images/qr-logo-fosforo.svg" alt="Fosforo Web QR Logo" class="nav-logo-img">
                        <h2 class="nav-logo-text"><?php echo SITE_NAME; ?></h2>
                    </a>
                </div>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="#inicio" class="nav-link active">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="#servicios" class="nav-link">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a href="#nosotros" class="nav-link">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contacto" class="nav-link">Contacto</a>
                    </li>
                </ul>
                <div class="hamburger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section id="inicio" class="hero">
        <div class="hero-container">
            <div class="hero-content">
                <h1 class="hero-title">
                    <span class="highlight">Encendemos</span> tu presencia online
                </h1>
                <p class="hero-description">
                    Creamos soluciones web profesionales que impulsan tu negocio hacia el éxito digital. 
                    Desde el diseño hasta el marketing, te acompañamos en cada paso.
                </p>
                <div class="hero-buttons">
                    <a href="#servicios" class="btn btn-primary">Nuestros Servicios</a>
                    <a href="#contacto" class="btn btn-secondary">Contactanos</a>
                    <a href="https://wa.me/542615597977?text=Hola!%20Me%20interesa%20conocer%20más%20sobre%20sus%20servicios%20de%20desarrollo%20web" 
                       class="btn btn-whatsapp" target="_blank" rel="noopener">
                        <i class="fab fa-whatsapp"></i> WhatsApp
                    </a>
                </div>
            </div>
            <div class="hero-image">
                <div class="hero-graphic">
                    <i class="fas fa-rocket"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- QR Showcase Section -->
    <section class="qr-showcase">
        <div class="container">
            <div class="qr-showcase-content">
                <div class="qr-info">
                    <h2 class="section-title">Nuestra Marca Única</h2>
                    <p class="section-subtitle">Transformamos códigos QR en experiencias visuales únicas</p>
                    <div class="qr-features">
                        <div class="feature-item">
                            <i class="fas fa-magic"></i>
                            <span>Diseño personalizado con tu marca</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-palette"></i>
                            <span>Efectos visuales y animaciones</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-mobile-alt"></i>
                            <span>Funcionalidad garantizada</span>
                        </div>
                    </div>
                </div>
                <div class="qr-visual">
                    <div class="qr-container">
                        <img src="assets/images/qr-logo-fosforo.svg" alt="Fosforo Web QR Logo" class="qr-logo">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="servicios" class="services">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Nuestros Servicios</h2>
                <p class="section-subtitle">Soluciones completas para tu presencia digital</p>
            </div>
            
            <div class="services-grid">
                <?php foreach ($services as $service): ?>
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-<?php echo getServiceIcon($service['title']); ?>"></i>
                    </div>
                    <h3 class="service-title"><?php echo htmlspecialchars($service['title']); ?></h3>
                    <p class="service-description"><?php echo htmlspecialchars($service['description']); ?></p>
                    <!-- Precios ocultos temporalmente -->
                    <!-- <div class="service-price">
                        <span class="price">$<?php echo number_format($service['price'], 0, ',', '.'); ?></span>
                    </div> -->
                    <a href="#contacto" class="service-btn">Consultar</a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="nosotros" class="about">
        <div class="container">
            <div class="about-content">
                <div class="about-text">
                    <h2 class="section-title">¿Por qué elegirnos?</h2>
                    <p class="about-description">
                        Somos un equipo apasionado por la tecnología y el diseño, especializados en crear 
                        experiencias digitales que conectan con tu audiencia y generan resultados.
                    </p>
                    <div class="features">
                        <div class="feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Diseño profesional y moderno</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Desarrollo responsive</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Soporte técnico continuo</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Optimización SEO</span>
                        </div>
                    </div>
                </div>
                <div class="about-stats">
                    <div class="stat">
                        <h3 class="stat-number">50+</h3>
                        <p class="stat-label">Proyectos Completados</p>
                    </div>
                    <div class="stat">
                        <h3 class="stat-number">100%</h3>
                        <p class="stat-label">Clientes Satisfechos</p>
                    </div>
                    <div class="stat">
                        <h3 class="stat-number">24/7</h3>
                        <p class="stat-label">Soporte Técnico</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contacto" class="contact">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Contactanos</h2>
                <p class="section-subtitle">¿Listo para encender tu presencia online?</p>
            </div>
            
            <div class="contact-content">
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h4>Email</h4>
                            <p>info@fosforoweb.com.ar</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <h4>Teléfono</h4>
                            <p>+54 261 559-7977</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h4>Ubicación</h4>
                            <p>Godoy Cruz, Mendoza, Argentina</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fab fa-whatsapp"></i>
                        <div>
                            <h4>WhatsApp</h4>
                            <p>+54 261 559-7977</p>
                            <a href="https://wa.me/542615597977?text=Hola!%20Me%20interesa%20conocer%20más%20sobre%20sus%20servicios%20de%20desarrollo%20web" 
                               class="whatsapp-btn" target="_blank" rel="noopener">
                                <i class="fab fa-whatsapp"></i> Chatear por WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
                
                <form class="contact-form" action="contact-handler.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Tu nombre" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Tu email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" placeholder="Tu teléfono">
                    </div>
                    <div class="form-group">
                        <textarea name="message" placeholder="Tu mensaje" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-main">
                <div class="footer-grid">
                    <!-- Sección Empresa -->
                    <div class="footer-section">
                        <div class="footer-logo">
                            <h4><?php echo SITE_NAME; ?></h4>
                            <p class="footer-tagline">Encendemos tu presencia online</p>
                        </div>
                        <p class="footer-description">Creamos soluciones digitales profesionales que impulsan tu negocio hacia el éxito digital. Desde el diseño hasta el marketing, te acompañamos en cada paso.</p>
                        <div class="social-links">
                            <a href="#" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                            <a href="#" target="_blank" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                    
                    <!-- Sección Servicios -->
                    <div class="footer-section">
                        <h4>Nuestros Servicios</h4>
                        <ul class="footer-links">
                            <li><a href="#servicios"><i class="fas fa-paint-brush"></i> Diseño Web</a></li>
                            <li><a href="#servicios"><i class="fas fa-chart-line"></i> Marketing Digital</a></li>
                            <li><a href="#servicios"><i class="fas fa-search"></i> SEO</a></li>
                            <li><a href="#servicios"><i class="fas fa-qrcode"></i> Códigos QR Innovadores</a></li>
                            <li><a href="#servicios"><i class="fas fa-shopping-cart"></i> E-commerce</a></li>
                            <li><a href="#servicios"><i class="fas fa-server"></i> Hosting</a></li>
                            <li><a href="#servicios"><i class="fas fa-tools"></i> Mantenimiento</a></li>
                        </ul>
                    </div>
                    
                    <!-- Sección Enlaces -->
                    <div class="footer-section">
                        <h4>Enlaces Útiles</h4>
                        <ul class="footer-links">
                            <li><a href="#home"><i class="fas fa-home"></i> Inicio</a></li>
                            <li><a href="#servicios"><i class="fas fa-briefcase"></i> Servicios</a></li>
                            <li><a href="#nosotros"><i class="fas fa-users"></i> Nosotros</a></li>
                            <li><a href="#contacto"><i class="fas fa-envelope"></i> Contacto</a></li>
                            <li><a href="#"><i class="fas fa-file-alt"></i> Política de Privacidad</a></li>
                            <li><a href="#"><i class="fas fa-gavel"></i> Términos y Condiciones</a></li>
                        </ul>
                    </div>
                    
                    <!-- Sección Contacto -->
                    <div class="footer-section">
                        <h4>Contacto</h4>
                        <div class="contact-info">
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <div>
                                    <span>Email</span>
                                    <a href="mailto:info@fosforoweb.com.ar">info@fosforoweb.com.ar</a>
                                </div>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <div>
                                    <span>Teléfono</span>
                                    <a href="tel:+542615597977">+54 261 559-7977</a>
                                </div>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <div>
                                    <span>Ubicación</span>
                                    <span>Godoy Cruz, Mendoza, Argentina</span>
                                </div>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-clock"></i>
                                <div>
                                    <span>Horarios</span>
                                    <span>Lun - Vie: 9:00 - 18:00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="footer-bottom-content">
                    <div class="footer-bottom-left">
                        <p>&copy; <?php echo date("Y"); ?> <?php echo SITE_NAME; ?>. Todos los derechos reservados.</p>
                    </div>
                    <div class="footer-bottom-right">
                        <p>Desarrollado con <i class="fas fa-heart"></i> en Mendoza, Argentina</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="assets/js/main.js"></script>
    
    <!-- Botón flotante de WhatsApp -->
    <div class="whatsapp-float">
        <a href="https://wa.me/542615597977?text=Hola!%20Me%20interesa%20conocer%20más%20sobre%20sus%20servicios%20de%20desarrollo%20web" 
           class="whatsapp-float-btn" target="_blank" rel="noopener" title="Chatear por WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
        <div class="whatsapp-tooltip">
            <span>¡Chateá con nosotros!</span>
            <div class="whatsapp-tooltip-arrow"></div>
        </div>
    </div>
    
           <!-- Debug Information (removed for production) -->
</body>
</html>

<?php
function getServiceIcon($title) {
    $icons = [
        'Diseño Web' => 'paint-brush',
        'Marketing Digital' => 'chart-line',
        'SEO' => 'search',
        'Códigos QR Innovadores' => 'qrcode',
        'E-commerce' => 'shopping-cart',
        'Hosting' => 'server',
        'Mantenimiento' => 'tools'
    ];
    
    return $icons[$title] ?? 'star';
}
?>
