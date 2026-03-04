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

} catch (PDOException $e) {
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
    <!-- Título optimizado para SEO - v4.0 -->
    <title>Software a Medida y Soluciones Digitales Reales | Fosforo Web</title>

    <!-- Meta Description optimizada -->
    <meta name="description"
        content="En Fosforo Web desarrollamos plataformas y aplicaciones a medida que resuelven problemas reales. Conocé nuestros casos de éxito en producción.">

    <!-- Meta Keywords actualizadas -->
    <meta name="keywords"
        content="desarrollo de software a medida, aplicaciones web, soluciones digitales, fosforo web, peludosclick, auditor de obras, building manager, gestion de consorcios">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://fosforoweb.com.ar/">
    <meta property="og:title" content="Software a Medida y Soluciones Digitales Reales | Fosforo Web">
    <meta property="og:description"
        content="Desarrollo de sistemas a medida y aplicaciones web funcionando en producción.">
    <meta property="og:image" content="https://fosforoweb.com.ar/assets/images/logo-main.png">
    <meta property="og:locale" content="es_AR">
    <meta property="og:site_name" content="Fosforo Web">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://fosforoweb.com.ar/">
    <meta property="twitter:title" content="Software a Medida y Soluciones Digitales Reales | Fosforo Web">
    <meta property="twitter:description"
        content="Desarrollo de sistemas a medida y aplicaciones web funcionando en producción.">
    <meta property="twitter:image" content="https://fosforoweb.com.ar/assets/images/logo-main.png">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="favicon.ico?v=2">
    <link rel="icon" type="image/png" sizes="1024x1024" href="favicon.png?v=3">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon.png?v=3">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon.png?v=3">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon.png?v=3">
    <link rel="shortcut icon" href="favicon.ico?v=2">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style-modern.css?v=1.4">
    <link rel="stylesheet" href="assets/css/colors.css?v=1.4">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- Schema Markup para SEO -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "Fosforo Web",
        "description": "Desarrollamos software escalable y a medida, con un enfoque en mostrar rápidamente soluciones web funcionando en producción.",
        "url": "https://fosforoweb.com.ar",
        "telephone": "+542615597977",
        "email": "info@fosforoweb.com.ar",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Godoy Cruz",
            "addressLocality": "Mendoza",
            "addressRegion": "Mendoza",
            "addressCountry": "Argentina"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": "-32.9442",
            "longitude": "-68.8383"
        },
        "openingHours": "Mo-Fr 09:00-18:00",
        "priceRange": "$$",
        "image": "https://fosforoweb.com.ar/assets/images/logo-main.png",
        "logo": "https://fosforoweb.com.ar/assets/images/logo-main.png",
        "sameAs": [
            "https://fosforoweb.com.ar"
        ],
        "hasOfferCatalog": {
            "@type": "OfferCatalog",
            "name": "Servicios de Desarrollo Web",
            "itemListElement": [
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Primera Página Web",
                        "description": "Creamos tu primera página web profesional desde cero, ideal para principiantes y pequeñas empresas."
                    }
                },
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Diseño Web Responsive",
                        "description": "Diseño web moderno que se adapta perfectamente a todos los dispositivos móviles y de escritorio."
                    }
                },
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Marketing Digital",
                        "description": "Estrategias de marketing online para hacer crecer tu negocio en internet."
                    }
                },
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "SEO y Posicionamiento",
                        "description": "Optimización para motores de búsqueda para que tu sitio web aparezca en Google."
                    }
                }
            ]
        },
        "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "reviewCount": "50"
        }
    }
    </script>

    <!-- FAQ Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
            {
                "@type": "Question",
                "name": "¿Cómo crear mi primera página web?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Te ayudamos a crear tu primera página web desde cero. Nos encargamos del diseño, desarrollo y configuración. Solo necesitas tener claro qué quieres mostrar en tu sitio web."
                }
            },
            {
                "@type": "Question",
                "name": "¿Cuánto cuesta hacer una página web?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Los precios varían según las necesidades específicas de cada proyecto. Ofrecemos paquetes accesibles para principiantes y pequeñas empresas. Contáctanos para un presupuesto personalizado."
                }
            },
            {
                "@type": "Question",
                "name": "¿Cuánto tiempo toma crear un sitio web?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Un sitio web básico puede estar listo en 2-4 semanas. Los tiempos dependen de la complejidad del proyecto y la cantidad de contenido que necesites."
                }
            },
            {
                "@type": "Question",
                "name": "¿Mi página web funcionará en móviles?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Sí, todos nuestros sitios web son responsive y se adaptan perfectamente a móviles, tablets y computadoras de escritorio."
                }
            }
        ]
    }
    </script>
</head>

<body>
    <!-- Header -->
    <header class="header">
        <nav class="navbar">
            <div class="nav-container">
                <div class="nav-logo">
                    <a href="#inicio" class="nav-logo-link">
                        <img src="assets/images/logo-main.png" alt="Fosforo Web Logo" class="nav-logo-img">
                        <h2 class="nav-logo-text"><?php echo SITE_NAME; ?></h2>
                    </a>
                </div>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="#inicio" class="nav-link active">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="#portfolio" class="nav-link">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a href="#servicios" class="nav-link">Servicios</a>
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
    <section id="inicio" class="hero hero-professional">
        <div class="hero-container">
            <div class="hero-content">
                <div
                    style="background: rgba(37, 99, 235, 0.1); color: var(--accent-color); padding: 8px 20px; border-radius: 50px; display: inline-block; margin-bottom: 20px; font-weight: 600; border: 1px solid rgba(37, 99, 235, 0.2);">
                    SOLUCIONES REALES Y FUNCIONANDO
                </div>
                <h1 class="hero-title">
                    Software a Medida <br><span class="highlight">Listo para Usar</span>
                </h1>
                <p class="hero-subtitle">
                    No vendemos ideas abstractas. Construimos sistemas reales, operativos y garantizados.
                </p>
                <p class="hero-description">
                    Desarrollamos plataformas escalables diseñadas para resolver problemas concretos de tu negocio hoy
                    mismo. Mirá nuestros casos de éxito en producción.
                </p>
                <div class="hero-buttons">
                    <a href="#portfolio" class="btn btn-primary">
                        Ver Portfolio
                    </a>
                    <a href="#contacto" class="btn btn-secondary">Contactar</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Nuestros Sistemas Activos</h2>
                <p class="section-subtitle">Casos de éxito reales que demuestran nuestra capacidad para dar soluciones
                    prácticas
                </p>
            </div>

            <div class="portfolio-grid">
                <!-- Project 1: PeludosClick -->
                <a href="https://peludosclick.com/" target="_blank"
                    style="text-decoration: none; color: inherit; display: block;" class="portfolio-card">
                    <div class="portfolio-image">
                        <i class="fas fa-paw"></i>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-tag">Plataforma & Ecosistema</span>
                        <h3 class="portfolio-title">Peludos Click</h3>
                        <p class="portfolio-description">Ecosistema digital integral para dueños de mascotas. Gestión de
                            chapitas QR, control de vacunas, historia clínica y búsqueda de profesionales.</p>
                        <div class="portfolio-tech-stack">
                            <span class="tech-badge">peludosclick.com</span>
                            <span class="tech-badge">Next.js</span>
                            <span class="tech-badge">QR Dynamics</span>
                        </div>
                    </div>
                </a>

                <!-- Project 2: Auditor de Obras -->
                <a href="https://auditordeobras.com.ar/" target="_blank"
                    style="text-decoration: none; color: inherit; display: block;" class="portfolio-card">
                    <div class="portfolio-image">
                        <i class="fas fa-hard-hat"></i>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-tag">Gestión y Control</span>
                        <h3 class="portfolio-title">Auditor de Obras</h3>
                        <p class="portfolio-description">Herramienta profesional para llevar el control exhaustivo de
                            obras en construcción, presupuestos, gastos, proveedores y avances de proyectos.</p>
                        <div class="portfolio-tech-stack">
                            <span class="tech-badge">auditordeobras.com.ar</span>
                            <span class="tech-badge">React</span>
                            <span class="tech-badge">API Rest</span>
                        </div>
                    </div>
                </a>

                <!-- Project 3: Building Manager -->
                <a href="https://gestionglobalprop.ar/" target="_blank"
                    style="text-decoration: none; color: inherit; display: block;" class="portfolio-card">
                    <div class="portfolio-image">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-tag">SaaS Administrativo</span>
                        <h3 class="portfolio-title">Gestión Global Prop</h3>
                        <p class="portfolio-description">El sistema definitivo para administradores de consorcios.
                            Simplifica el cálculo de expensas, control de pagos, reportes de deudas y comunicación
                            fluída.</p>
                        <div class="portfolio-tech-stack">
                            <span class="tech-badge">gestionglobalprop.ar</span>
                            <span class="tech-badge">React</span>
                            <span class="tech-badge">PostgreSQL</span>
                        </div>
                    </div>
                </a>
            </div>

            <div style="text-align: center; margin-top: 4rem;">
                <a href="#contacto" class="btn btn-primary" style="padding: 1rem 3rem;">
                    Resolvé tu problema hoy
                </a>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="servicios" class="services">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Servicios Profesionales</h2>
                <p class="section-subtitle">Soluciones tecnológicas de alto nivel para escalar tu negocio</p>
            </div>

            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <h3 class="service-title">Desarrollo a Medida</h3>
                    <p class="service-description">Creamos software diseñado específicamente para resolver los desafíos
                        únicos de tu empresa, asegurando escalabilidad y rendimiento.</p>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3 class="service-title">Aplicaciones Móviles</h3>
                    <p class="service-description">Desarrollo de apps nativas y multiplataforma con experiencias de
                        usuario fluidas y diseños modernos.</p>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h3 class="service-title">E-commerce Avanzado</h3>
                    <p class="service-description">Plataformas de venta online robustas, con integraciones de pago,
                        gestión de stock y conexiones con ERPs.</p>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-cloud"></i>
                    </div>
                    <h3 class="service-title">Soluciones Cloud</h3>
                    <p class="service-description">Arquitectura de software en la nube, migraciones y optimización de
                        infraestructura para máxima disponibilidad.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="nosotros" class="about">
        <div class="container">
            <div class="about-content">
                <div class="about-text">
                    <h2 class="section-title" style="text-align: left !important;">Ingeniería de Software de Calidad
                    </h2>
                    <p class="about-description">
                        En Fosforo Web no solo escribimos código; construimos activos digitales que generan valor.
                        Nuestro enfoque combina ingeniería robusta con diseño intuitivo.
                    </p>
                    <p class="about-description">
                        Nos especializamos en proyectos complejos donde la performance, la seguridad y la experiencia de
                        usuario son críticos.
                    </p>
                    <div class="features">
                        <div class="feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Metodologías Ágiles</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Código Limpio y Mantenible</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Diseño UX/UI Centrado en Usuario</span>
                        </div>
                    </div>
                </div>
                <div class="about-stats">
                    <div class="stat-item">
                        <div style="flex: 1;">
                            <h3 class="stat-number">5+</h3>
                            <p class="stat-label">Años de Experiencia</p>
                        </div>
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="stat-item">
                        <div style="flex: 1;">
                            <h3 class="stat-number">50+</h3>
                            <p class="stat-label">Proyectos Exitosos</p>
                        </div>
                        <i class="fas fa-project-diagram"></i>
                    </div>
                    <div class="stat-item">
                        <div style="flex: 1;">
                            <h3 class="stat-number">100%</h3>
                            <p class="stat-label">Compromiso</p>
                        </div>
                        <i class="fas fa-handshake"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contacto" class="contact">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Hablemos de tu Proyecto</h2>
                <p class="section-subtitle">Consultoría inicial gratuita para evaluar la viabilidad de tu idea</p>
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
                        <p class="footer-description">Creamos soluciones digitales profesionales que impulsan tu negocio
                            hacia el éxito digital. Desde el diseño hasta el marketing, te acompañamos en cada paso.</p>
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
                                    <span>Email: </span>
                                    <a href="mailto:info@fosforoweb.com.ar">info@fosforoweb.com.ar</a>
                                </div>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <div>
                                    <span>Teléfono: </span>
                                    <a href="tel:+542615597977">+54 261 559-7977</a>
                                </div>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <div>
                                    <span>Ubicación: </span>
                                    <span>Godoy Cruz, Mendoza, Argentina</span>
                                </div>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-clock"></i>
                                <div>
                                    <span>Horarios: </span>
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
function getServiceIcon($title)
{
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