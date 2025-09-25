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
    <!-- Título optimizado para SEO - v3.0 -->
    <title>Tu Primera Página Web - Desarrollo Web para Principiantes | Fosforo Web</title>
    
    <!-- Meta Description optimizada -->
    <meta name="description" content="¿Quieres hacer tu primera página web? Te ayudamos a crear tu sitio web profesional desde cero. Diseño web para principiantes, empresas y emprendedores en Mendoza, Argentina. ¡Contáctanos!">
    
    <!-- Meta Keywords actualizadas -->
    <meta name="keywords" content="primera pagina web, hacer pagina web, crear sitio web, desarrollo web principiantes, diseño web mendoza, pagina web barata, sitio web profesional, desarrollo web argentina, como hacer una pagina web, diseño web economico, pagina web paso a paso, crear pagina web mendoza">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://fosforoweb.com.ar/">
    <meta property="og:title" content="Tu Primera Página Web - Desarrollo Web para Principiantes | Fosforo Web">
    <meta property="og:description" content="¿Quieres hacer tu primera página web? Te ayudamos a crear tu sitio web profesional desde cero. Diseño web para principiantes en Mendoza, Argentina.">
    <meta property="og:image" content="https://fosforoweb.com.ar/assets/images/qr-logo-fosforo.svg">
    <meta property="og:locale" content="es_AR">
    <meta property="og:site_name" content="Fosforo Web">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://fosforoweb.com.ar/">
    <meta property="twitter:title" content="Tu Primera Página Web - Desarrollo Web para Principiantes | Fosforo Web">
    <meta property="twitter:description" content="¿Quieres hacer tu primera página web? Te ayudamos a crear tu sitio web profesional desde cero. Diseño web para principiantes en Mendoza, Argentina.">
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
    <link rel="stylesheet" href="assets/css/colors.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <!-- Schema Markup para SEO -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "Fosforo Web",
        "description": "Desarrollo web profesional para principiantes. Creamos tu primera página web desde cero con diseño moderno y responsive.",
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
        "image": "https://fosforoweb.com.ar/assets/images/qr-logo-fosforo.svg",
        "logo": "https://fosforoweb.com.ar/assets/images/qr-logo-fosforo.svg",
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
                        <img src="assets/images/qr-logo-fosforo.svg" alt="Fosforo Web QR Logo" class="nav-logo-img">
                        <h2 class="nav-logo-text"><?php echo SITE_NAME; ?></h2>
                    </a>
                </div>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="#inicio" class="nav-link active">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="/guia-primera-pagina-web.php" class="nav-link">Guía</a>
                    </li>
                    <li class="nav-item">
                        <a href="/precios-pagina-web.php" class="nav-link">Precios</a>
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
    <section id="inicio" class="hero">
        <div class="hero-container">
            <div class="hero-content">
                <h1 class="hero-title">
                    <span class="highlight">Tu Primera Página Web</span> Profesional
                </h1>
                <p class="hero-description">
                    ¿Quieres hacer tu primera página web? Te ayudamos a crear tu sitio web profesional desde cero. 
                    Diseño web para principiantes, empresas y emprendedores. ¡Es más fácil de lo que crees!
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

    <!-- Sección para Principiantes -->
    <section class="beginners-section">
        <div class="container">
            <!-- Título principal mejorado -->
            <div class="section-header">
                <h2 class="section-title">Tu Primera Página Web en 4 Pasos Simples</h2>
                <p class="section-subtitle">Un proceso diseñado especialmente para principiantes. Sin complicaciones, sin sorpresas.</p>
            </div>
            
            <!-- Proceso en timeline vertical -->
            <div class="process-timeline">
                <div class="timeline-item">
                    <div class="timeline-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <div class="timeline-content">
                        <h3>1. Consultoría Gratuita</h3>
                        <p>Analizamos tus necesidades y te explicamos todo el proceso de forma sencilla. Sin compromisos.</p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-icon">
                        <i class="fas fa-palette"></i>
                    </div>
                    <div class="timeline-content">
                        <h3>2. Diseño Personalizado</h3>
                        <p>Creamos un diseño único para tu negocio, adaptado a tu marca y objetivos específicos.</p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <div class="timeline-content">
                        <h3>3. Desarrollo Profesional</h3>
                        <p>Programamos tu sitio web con las mejores tecnologías y estándares actuales del mercado.</p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="timeline-content">
                        <h3>4. Capacitación Incluida</h3>
                        <p>Te enseñamos a gestionar tu sitio web para que puedas actualizarlo tú mismo cuando quieras.</p>
                    </div>
                </div>
            </div>
                
            
            <!-- Beneficios destacados -->
            <div class="benefits-showcase">
                <h3>¿Por qué somos la mejor opción para tu primera página web?</h3>
                <div class="benefits-grid">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <h4 class="benefit-title">Experiencia con Principiantes</h4>
                        <p class="benefit-description">Sabemos cómo explicarte todo de forma sencilla</p>
                    </div>
                    
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <h4 class="benefit-title">Precios Accesibles</h4>
                        <p class="benefit-description">Paquetes diseñados para emprendedores</p>
                    </div>
                    
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h4 class="benefit-title">Soporte Completo</h4>
                        <p class="benefit-description">Te acompañamos durante todo el proceso</p>
                    </div>
                    
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4 class="benefit-title">Garantía Total</h4>
                        <p class="benefit-description">Tu sitio funcionará perfectamente</p>
                    </div>
                    
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <h4 class="benefit-title">Sin Conocimientos Técnicos</h4>
                        <p class="benefit-description">Nos encargamos de toda la parte técnica</p>
                    </div>
                </div>
            </div>
        </div>
            
            <div class="cta-section">
                <h3>¿Listo para crear tu primera página web?</h3>
                <p>Contáctanos y te ayudamos a dar el primer paso hacia tu presencia online profesional.</p>
                <div class="cta-buttons">
                    <a href="/guia-primera-pagina-web.php" class="btn btn-secondary">Ver Guía Paso a Paso</a>
                    <a href="/precios-pagina-web.php" class="btn btn-primary">Ver Precios</a>
                    <a href="https://wa.me/542615597977?text=Hola!%20Quiero%20crear%20mi%20primera%20página%20web" 
                       class="btn btn-whatsapp" target="_blank" rel="noopener">
                        <i class="fab fa-whatsapp"></i> Consulta Gratuita
                    </a>
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
