<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Precios Página Web - Paquetes Transparentes para Principiantes | Fosforo Web</title>
    
    <!-- Meta Description -->
    <meta name="description" content="Precios transparentes para tu primera página web. Paquetes diseñados para principiantes y pequeñas empresas. Sin sorpresas, todo incluido. ¡Consulta nuestros precios!">
    
    <!-- Meta Keywords -->
    <meta name="keywords" content="precio página web, cuánto cuesta sitio web, página web barata, precio desarrollo web, paquetes página web, diseño web económico, presupuesto página web">
    
    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://fosforoweb.com.ar/precios-pagina-web.php">
    <meta property="og:title" content="Precios Página Web - Paquetes Transparentes">
    <meta property="og:description" content="Precios transparentes para tu primera página web. Paquetes diseñados para principiantes.">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="favicon.ico?v=2">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/css/style-modern.css">
    <link rel="stylesheet" href="assets/css/colors.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <!-- Schema Markup para Precios -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Service",
        "name": "Desarrollo de Página Web",
        "description": "Creación de páginas web profesionales para principiantes y pequeñas empresas",
        "provider": {
            "@type": "LocalBusiness",
            "name": "Fosforo Web",
            "address": {
                "@type": "PostalAddress",
                "addressLocality": "Mendoza",
                "addressCountry": "Argentina"
            }
        },
        "offers": [
            {
                "@type": "Offer",
                "name": "Paquete Básico",
                "description": "Página web básica perfecta para principiantes",
                "price": "50000",
                "priceCurrency": "ARS"
            },
            {
                "@type": "Offer", 
                "name": "Paquete Profesional",
                "description": "Página web profesional con funcionalidades avanzadas",
                "price": "80000",
                "priceCurrency": "ARS"
            },
            {
                "@type": "Offer",
                "name": "Paquete Premium",
                "description": "Página web completa con e-commerce y marketing",
                "price": "120000",
                "priceCurrency": "ARS"
            }
        ]
    }
    </script>
    
    <style>
        .pricing-hero {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            padding: 80px 0;
            text-align: center;
        }
        
        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin: 60px 0;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .pricing-card {
            background: white;
            border-radius: 20px;
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            position: relative;
            transition: all 0.3s ease;
        }
        
        .pricing-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        
        .pricing-card.featured {
            border: 3px solid #007bff;
            transform: scale(1.05);
        }
        
        .pricing-card.featured::before {
            content: "Más Popular";
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            background: #007bff;
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
        }
        
        .package-name {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }
        
        .package-description {
            color: #666;
            margin-bottom: 30px;
            font-size: 16px;
        }
        
        .price {
            font-size: 48px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 10px;
        }
        
        .price-currency {
            font-size: 18px;
            color: #666;
        }
        
        .features-list {
            list-style: none;
            padding: 0;
            margin: 30px 0;
            text-align: left;
        }
        
        .features-list li {
            padding: 10px 0;
            display: flex;
            align-items: center;
        }
        
        .features-list i {
            color: #28a745;
            margin-right: 15px;
            width: 20px;
        }
        
        .pricing-cta {
            margin-top: 30px;
        }
        
        .pricing-cta .btn {
            width: 100%;
            padding: 15px;
            font-size: 16px;
            font-weight: 600;
        }
        
        .transparency-section {
            background: #f8f9fa;
            padding: 60px 0;
            margin: 60px 0;
        }
        
        .transparency-content {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }
        
        .transparency-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin: 40px 0;
        }
        
        .transparency-item {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .transparency-item i {
            font-size: 48px;
            color: #007bff;
            margin-bottom: 20px;
        }
        
        .faq-section {
            max-width: 800px;
            margin: 0 auto;
            padding: 60px 20px;
        }
        
        .faq-item {
            background: white;
            border-radius: 10px;
            margin: 20px 0;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .faq-question {
            background: var(--bg-white);
            padding: 20px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: var(--text-primary);
            border-bottom: 1px solid var(--border-light);
        }
        
        .faq-question:hover {
            background: var(--bg-light);
        }
        
        .faq-answer {
            padding: 20px;
            color: var(--text-secondary);
            line-height: 1.6;
            background: var(--bg-white);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <nav class="navbar">
            <div class="nav-container">
                <div class="nav-logo">
                    <a href="/" class="nav-logo-link">
                        <img src="assets/images/qr-logo-fosforo.svg" alt="Fosforo Web QR Logo" class="nav-logo-img">
                        <h2 class="nav-logo-text"><?php echo SITE_NAME; ?></h2>
                    </a>
                </div>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="/" class="nav-link">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="/guia-primera-pagina-web.php" class="nav-link">Guía</a>
                    </li>
                    <li class="nav-item">
                        <a href="/precios-pagina-web.php" class="nav-link active">Precios</a>
                    </li>
                    <li class="nav-item">
                        <a href="/#contacto" class="nav-link">Contacto</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="pricing-hero">
        <div class="container">
            <h1>💰 Precios Transparentes</h1>
            <p class="hero-description">
                Paquetes diseñados especialmente para principiantes. Sin sorpresas, todo incluido.
            </p>
        </div>
    </section>

    <!-- Pricing Grid -->
    <section class="container">
        <div class="pricing-grid">
            <!-- Paquete Básico -->
            <div class="pricing-card">
                <div class="package-name">🚀 Básico</div>
                <div class="package-description">Perfecto para tu primera página web</div>
                <div class="price">$50.000</div>
                <div class="price-currency">Pesos argentinos</div>
                
                <ul class="features-list">
                    <li><i class="fas fa-check"></i> Hasta 5 páginas</li>
                    <li><i class="fas fa-check"></i> Diseño responsive</li>
                    <li><i class="fas fa-check"></i> Formulario de contacto</li>
                    <li><i class="fas fa-check"></i> Optimización SEO básica</li>
                    <li><i class="fas fa-check"></i> 1 año de hosting incluido</li>
                    <li><i class="fas fa-check"></i> Dominio .com.ar incluido</li>
                    <li><i class="fas fa-check"></i> Capacitación básica</li>
                    <li><i class="fas fa-check"></i> Soporte por 3 meses</li>
                </ul>
                
                <div class="pricing-cta">
                    <a href="/#contacto" class="btn btn-primary">Solicitar</a>
                </div>
            </div>

            <!-- Paquete Profesional -->
            <div class="pricing-card featured">
                <div class="package-name">⭐ Profesional</div>
                <div class="package-description">Ideal para empresas en crecimiento</div>
                <div class="price">$80.000</div>
                <div class="price-currency">Pesos argentinos</div>
                
                <ul class="features-list">
                    <li><i class="fas fa-check"></i> Hasta 10 páginas</li>
                    <li><i class="fas fa-check"></i> Diseño personalizado</li>
                    <li><i class="fas fa-check"></i> Integración con redes sociales</li>
                    <li><i class="fas fa-check"></i> Google Analytics incluido</li>
                    <li><i class="fas fa-check"></i> Google My Business setup</li>
                    <li><i class="fas fa-check"></i> Optimización SEO avanzada</li>
                    <li><i class="fas fa-check"></i> 1 año de hosting incluido</li>
                    <li><i class="fas fa-check"></i> Dominio .com.ar incluido</li>
                    <li><i class="fas fa-check"></i> Capacitación completa</li>
                    <li><i class="fas fa-check"></i> Soporte por 6 meses</li>
                </ul>
                
                <div class="pricing-cta">
                    <a href="/#contacto" class="btn btn-primary">Solicitar</a>
                </div>
            </div>

            <!-- Paquete Premium -->
            <div class="pricing-card">
                <div class="package-name">👑 Premium</div>
                <div class="package-description">Solución completa para tu negocio</div>
                <div class="price">$120.000</div>
                <div class="price-currency">Pesos argentinos</div>
                
                <ul class="features-list">
                    <li><i class="fas fa-check"></i> Páginas ilimitadas</li>
                    <li><i class="fas fa-check"></i> Diseño premium personalizado</li>
                    <li><i class="fas fa-check"></i> Tienda online básica</li>
                    <li><i class="fas fa-check"></i> Integración con WhatsApp</li>
                    <li><i class="fas fa-check"></i> Sistema de citas online</li>
                    <li><i class="fas fa-check"></i> Blog integrado</li>
                    <li><i class="fas fa-check"></i> SEO avanzado + Google Ads</li>
                    <li><i class="fas fa-check"></i> 1 año de hosting incluido</li>
                    <li><i class="fas fa-check"></i> Dominio .com.ar incluido</li>
                    <li><i class="fas fa-check"></i> Capacitación premium</li>
                    <li><i class="fas fa-check"></i> Soporte por 12 meses</li>
                </ul>
                
                <div class="pricing-cta">
                    <a href="/#contacto" class="btn btn-primary">Solicitar</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Transparencia Section -->
    <section class="transparency-section">
        <div class="container">
            <div class="transparency-content">
                <h2>🔍 Transparencia Total</h2>
                <p>No hay costos ocultos ni sorpresas. Te explicamos exactamente qué incluye cada paquete.</p>
                
                <div class="transparency-grid">
                    <div class="transparency-item">
                        <i class="fas fa-shield-alt"></i>
                        <h3>Sin Costos Ocultos</h3>
                        <p>El precio que ves es el precio final. No cobramos extras por cambios menores.</p>
                    </div>
                    
                    <div class="transparency-item">
                        <i class="fas fa-clock"></i>
                        <h3>Tiempos Claros</h3>
                        <p>Te damos fechas específicas de entrega y te mantenemos informado del progreso.</p>
                    </div>
                    
                    <div class="transparency-item">
                        <i class="fas fa-handshake"></i>
                        <h3>Garantía de Satisfacción</h3>
                        <p>Si no estás conforme con el resultado, trabajamos hasta que lo estés.</p>
                    </div>
                    
                    <div class="transparency-item">
                        <i class="fas fa-headset"></i>
                        <h3>Soporte Incluido</h3>
                        <p>Cada paquete incluye soporte técnico durante el período especificado.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <h2 style="color: var(--text-primary); text-align: center; margin-bottom: 40px;">❓ Preguntas sobre Precios</h2>
        
        <div class="faq-item">
            <div class="faq-question">
                <span>¿Por qué estos precios son accesibles?</span>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                <p>Nos especializamos en principiantes y hemos optimizado nuestro proceso para ser eficientes. Además, creemos que tener una página web no debería ser un lujo, sino una necesidad accesible para todos los emprendedores.</p>
            </div>
        </div>
        
        <div class="faq-item">
            <div class="faq-question">
                <span>¿Puedo pagar en cuotas?</span>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                <p>Sí, ofrecemos planes de pago flexibles. Puedes pagar el 50% al inicio y el 50% restante cuando entreguemos tu página web. También aceptamos transferencias bancarias y Mercado Pago.</p>
            </div>
        </div>
        
        <div class="faq-item">
            <div class="faq-question">
                <span>¿Qué pasa si necesito cambios después?</span>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                <p>Los cambios menores (textos, imágenes, información de contacto) son gratuitos durante el período de soporte. Para cambios mayores (nuevas páginas, funcionalidades), te damos un presupuesto transparente.</p>
            </div>
        </div>
        
        <div class="faq-item">
            <div class="faq-question">
                <span>¿Incluye el mantenimiento del sitio?</span>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                <p>Sí, todos los paquetes incluyen el hosting y mantenimiento básico del servidor durante el primer año. Esto incluye actualizaciones de seguridad y respaldos automáticos.</p>
            </div>
        </div>
        
        <div class="faq-item">
            <div class="faq-question">
                <span>¿Puedo cambiar de paquete después?</span>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                <p>¡Por supuesto! Si tu negocio crece y necesitas más funcionalidades, podemos actualizar tu sitio web. Solo pagas la diferencia entre paquetes, sin perder lo que ya tienes.</p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section" style="background: linear-gradient(135deg, #007bff, #0056b3); color: white; padding: 60px 0; text-align: center;">
        <div class="container">
            <h2>¿Listo para comenzar?</h2>
            <p>Elige el paquete que mejor se adapte a tus necesidades y comienza tu presencia online profesional.</p>
            <div class="cta-buttons" style="margin-top: 30px;">
                <a href="/#contacto" class="btn btn-primary" style="background: white; color: #007bff; margin: 10px;">Solicitar Presupuesto</a>
                <a href="https://wa.me/542615597977?text=Hola!%20Quiero%20saber%20más%20sobre%20los%20precios%20de%20página%20web" 
                   class="btn btn-whatsapp" target="_blank" rel="noopener" style="background: #25d366; color: white; margin: 10px;">
                    <i class="fab fa-whatsapp"></i> Consulta por WhatsApp
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-main">
                <div class="footer-grid">
                    <div class="footer-section">
                        <div class="footer-logo">
                            <h4><?php echo SITE_NAME; ?></h4>
                            <p class="footer-tagline">Precios transparentes para tu primera página web</p>
                        </div>
                    </div>
                    
                    <div class="footer-section">
                        <h4>Enlaces</h4>
                        <ul class="footer-links">
                            <li><a href="/"><i class="fas fa-home"></i> Inicio</a></li>
                            <li><a href="/guia-primera-pagina-web.php"><i class="fas fa-book"></i> Guía</a></li>
                            <li><a href="/precios-pagina-web.php"><i class="fas fa-dollar-sign"></i> Precios</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <div class="footer-bottom-content">
                    <div class="footer-bottom-left">
                        <p>&copy; <?php echo date("Y"); ?> <?php echo SITE_NAME; ?>. Todos los derechos reservados.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Botón flotante de WhatsApp -->
    <div class="whatsapp-float">
        <a href="https://wa.me/542615597977?text=Hola!%20Tengo%20dudas%20sobre%20los%20precios%20de%20página%20web" 
           class="whatsapp-float-btn" target="_blank" rel="noopener" title="Consulta sobre precios">
            <i class="fab fa-whatsapp"></i>
        </a>
        <div class="whatsapp-tooltip">
            <span>¿Dudas sobre precios?</span>
            <div class="whatsapp-tooltip-arrow"></div>
        </div>
    </div>

    <script src="assets/js/main.js"></script>
</body>
</html>
