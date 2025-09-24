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
    // Si hay error, usar servicios por defecto
    $services = [
        ['title' => 'Diseño Web', 'description' => 'Sitios web profesionales y responsivos', 'price' => 50000],
        ['title' => 'Marketing Digital', 'description' => 'Estrategias de marketing online', 'price' => 30000],
        ['title' => 'SEO', 'description' => 'Optimización para motores de búsqueda', 'price' => 25000]
    ];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITE_NAME; ?> - Encendemos tu presencia online</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <nav class="navbar">
            <div class="nav-container">
                <div class="nav-logo">
                    <h2><?php echo SITE_NAME; ?></h2>
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
                </div>
            </div>
            <div class="hero-image">
                <div class="hero-graphic">
                    <i class="fas fa-rocket"></i>
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
                    <div class="service-price">
                        <span class="price">$<?php echo number_format($service['price'], 0, ',', '.'); ?></span>
                    </div>
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
                            <p>+54 11 1234-5678</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h4>Ubicación</h4>
                            <p>Buenos Aires, Argentina</p>
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
            <div class="footer-content">
                <div class="footer-section">
                    <h3><?php echo SITE_NAME; ?></h3>
                    <p>Encendemos tu presencia online con soluciones digitales profesionales.</p>
                </div>
                <div class="footer-section">
                    <h4>Servicios</h4>
                    <ul>
                        <li><a href="#servicios">Diseño Web</a></li>
                        <li><a href="#servicios">Marketing Digital</a></li>
                        <li><a href="#servicios">SEO</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Contacto</h4>
                    <p>info@fosforoweb.com.ar</p>
                    <p>+54 11 1234-5678</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?php echo date("Y"); ?> <?php echo SITE_NAME; ?>. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <script src="assets/js/main.js"></script>
</body>
</html>

<?php
function getServiceIcon($title) {
    $icons = [
        'Diseño Web' => 'paint-brush',
        'Marketing Digital' => 'chart-line',
        'SEO' => 'search',
        'E-commerce' => 'shopping-cart',
        'Hosting' => 'server',
        'Mantenimiento' => 'tools'
    ];
    
    return $icons[$title] ?? 'star';
}
?>
