<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cómo Crear tu Primera Página Web - Guía Paso a Paso | Fosforo Web</title>
    
    <!-- Meta Description optimizada -->
    <meta name="description" content="Aprende a crear tu primera página web con nuestra guía completa. Tutorial paso a paso para principiantes. Sin conocimientos técnicos necesarios. ¡Comienza tu presencia online!">
    
    <!-- Meta Keywords -->
    <meta name="keywords" content="cómo crear página web, primera página web, tutorial sitio web, crear sitio web paso a paso, diseño web principiantes, guía página web, hacer página web desde cero">
    
    <!-- Open Graph -->
    <meta property="og:type" content="article">
    <meta property="og:url" content="https://fosforoweb.com.ar/guia-primera-pagina-web.php">
    <meta property="og:title" content="Cómo Crear tu Primera Página Web - Guía Paso a Paso">
    <meta property="og:description" content="Aprende a crear tu primera página web con nuestra guía completa. Tutorial paso a paso para principiantes.">
    <meta property="og:image" content="https://fosforoweb.com.ar/assets/images/qr-logo-fosforo.svg">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="favicon.ico?v=2">
    <link rel="icon" type="image/svg+xml" href="favicon.svg?v=2">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/css/style-modern.css">
    <link rel="stylesheet" href="assets/css/colors.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <!-- Schema Markup para Artículo -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "HowTo",
        "name": "Cómo Crear tu Primera Página Web",
        "description": "Guía completa paso a paso para crear tu primera página web profesional",
        "image": "https://fosforoweb.com.ar/assets/images/qr-logo-fosforo.svg",
        "totalTime": "PT4H",
        "estimatedCost": {
            "@type": "MonetaryAmount",
            "currency": "ARS",
            "value": "50000"
        },
        "supply": [
            {
                "@type": "HowToSupply",
                "name": "Dominio"
            },
            {
                "@type": "HowToSupply", 
                "name": "Hosting"
            },
            {
                "@type": "HowToSupply",
                "name": "Contenido para la página"
            }
        ],
        "step": [
            {
                "@type": "HowToStep",
                "name": "Planificar tu página web",
                "text": "Define el objetivo de tu página web, tu audiencia objetivo y qué contenido necesitas.",
                "url": "https://fosforoweb.com.ar/guia-primera-pagina-web.php#paso1"
            },
            {
                "@type": "HowToStep",
                "name": "Elegir dominio y hosting",
                "text": "Selecciona un nombre de dominio memorable y contrata un servicio de hosting confiable.",
                "url": "https://fosforoweb.com.ar/guia-primera-pagina-web.php#paso2"
            },
            {
                "@type": "HowToStep",
                "name": "Diseñar tu página web",
                "text": "Crea un diseño atractivo y profesional que refleje tu marca.",
                "url": "https://fosforoweb.com.ar/guia-primera-pagina-web.php#paso3"
            },
            {
                "@type": "HowToStep",
                "name": "Desarrollar y publicar",
                "text": "Programa tu página web y publícala en internet.",
                "url": "https://fosforoweb.com.ar/guia-primera-pagina-web.php#paso4"
            }
        ],
        "author": {
            "@type": "Organization",
            "name": "Fosforo Web",
            "url": "https://fosforoweb.com.ar"
        }
    }
    </script>
    
    <style>
        .guide-hero {
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            color: white;
            padding: 80px 0;
            text-align: center;
        }
        
        .guide-content {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        
        .step-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            margin: 30px 0;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            border-left: 5px solid #007bff;
        }
        
        .step-number {
            background: #007bff;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 20px;
        }
        
        .checklist {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
        }
        
        .checklist ul {
            list-style: none;
            padding: 0;
        }
        
        .checklist li {
            display: flex;
            align-items: center;
            margin: 10px 0;
        }
        
        .checklist i {
            color: #28a745;
            margin-right: 10px;
        }
        
        .cta-guide {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            padding: 40px;
            border-radius: 15px;
            text-align: center;
            margin: 40px 0;
        }
        
        .resources {
            background: #e3f2fd;
            padding: 30px;
            border-radius: 15px;
            margin: 30px 0;
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
                        <a href="/#servicios" class="nav-link">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a href="/#contacto" class="nav-link">Contacto</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="guide-hero">
        <div class="container">
            <h1>📚 Cómo Crear tu Primera Página Web</h1>
            <p class="hero-description">
                Guía completa paso a paso para principiantes. Sin conocimientos técnicos necesarios.
            </p>
            <div class="hero-buttons">
                <a href="#paso1" class="btn btn-secondary">Comenzar Guía</a>
                <a href="/#contacto" class="btn btn-primary">¿Necesitas Ayuda?</a>
            </div>
        </div>
    </section>

    <!-- Guía Content -->
    <section class="guide-content">
        <div class="container">
            <div class="step-card" id="paso1">
                <div class="step-number">1</div>
                <h2>🎯 Planifica tu Página Web</h2>
                <p>Antes de empezar, es importante tener claro qué quieres lograr con tu página web.</p>
                
                <h3>¿Qué necesitas definir?</h3>
                <div class="checklist">
                    <ul>
                        <li><i class="fas fa-check"></i> <strong>Objetivo:</strong> ¿Para qué quieres la página? (vender, informar, contactar)</li>
                        <li><i class="fas fa-check"></i> <strong>Audiencia:</strong> ¿Quién va a visitar tu página?</li>
                        <li><i class="fas fa-check"></i> <strong>Contenido:</strong> ¿Qué información vas a mostrar?</li>
                        <li><i class="fas fa-check"></i> <strong>Presupuesto:</strong> ¿Cuánto puedes invertir?</li>
                        <li><i class="fas fa-check"></i> <strong>Tiempo:</strong> ¿Cuándo la necesitas lista?</li>
                    </ul>
                </div>
                
                <div class="resources">
                    <h4>📋 Recursos para esta etapa:</h4>
                    <ul>
                        <li>✅ Plantilla de planificación de página web</li>
                        <li>✅ Lista de verificación de contenido</li>
                        <li>✅ Guía de presupuestos para principiantes</li>
                    </ul>
                </div>
            </div>

            <div class="step-card" id="paso2">
                <div class="step-number">2</div>
                <h2>🌐 Elige Dominio y Hosting</h2>
                <p>El dominio es tu dirección en internet y el hosting es donde se aloja tu página.</p>
                
                <h3>¿Qué es un dominio?</h3>
                <p>Es la dirección que las personas escriben para encontrar tu página (ej: mipagina.com.ar)</p>
                
                <h3>¿Qué es el hosting?</h3>
                <p>Es el servicio que guarda tu página web en internet para que otros puedan verla.</p>
                
                <div class="checklist">
                    <h4>Consejos para elegir dominio:</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Que sea fácil de recordar</li>
                        <li><i class="fas fa-check"></i> Relacionado con tu negocio</li>
                        <li><i class="fas fa-check"></i> Preferiblemente .com.ar para Argentina</li>
                        <li><i class="fas fa-check"></i> Sin guiones o números complicados</li>
                    </ul>
                </div>
            </div>

            <div class="step-card" id="paso3">
                <div class="step-number">3</div>
                <h2>🎨 Diseña tu Página Web</h2>
                <p>El diseño es lo primero que ven las personas. Debe ser atractivo y fácil de usar.</p>
                
                <h3>Elementos importantes del diseño:</h3>
                <div class="checklist">
                    <ul>
                        <li><i class="fas fa-check"></i> <strong>Colores:</strong> Que representen tu marca</li>
                        <li><i class="fas fa-check"></i> <strong>Tipografía:</strong> Fácil de leer</li>
                        <li><i class="fas fa-check"></i> <strong>Imágenes:</strong> De buena calidad</li>
                        <li><i class="fas fa-check"></i> <strong>Navegación:</strong> Simple e intuitiva</li>
                        <li><i class="fas fa-check"></i> <strong>Responsive:</strong> Que funcione en móviles</li>
                    </ul>
                </div>
                
                <div class="resources">
                    <h4>🎨 Herramientas de diseño recomendadas:</h4>
                    <ul>
                        <li>✅ Canva (para principiantes)</li>
                        <li>✅ Figma (más avanzado)</li>
                        <li>✅ Plantillas pre-diseñadas</li>
                    </ul>
                </div>
            </div>

            <div class="step-card" id="paso4">
                <div class="step-number">4</div>
                <h2>⚙️ Desarrolla y Publica</h2>
                <p>Es hora de convertir tu diseño en una página web real y ponerla en internet.</p>
                
                <h3>Opciones para principiantes:</h3>
                <div class="checklist">
                    <ul>
                        <li><i class="fas fa-check"></i> <strong>Constructor de sitios web:</strong> Wix, Squarespace (fácil)</li>
                        <li><i class="fas fa-check"></i> <strong>WordPress:</strong> Más flexible pero complejo</li>
                        <li><i class="fas fa-check"></i> <strong>Contratar profesional:</strong> La opción más segura</li>
                    </ul>
                </div>
                
                <h3>Después de publicar:</h3>
                <div class="checklist">
                    <ul>
                        <li><i class="fas fa-check"></i> Probar en diferentes dispositivos</li>
                        <li><i class="fas fa-check"></i> Verificar que todos los enlaces funcionen</li>
                        <li><i class="fas fa-check"></i> Configurar Google Analytics</li>
                        <li><i class="fas fa-check"></i> Crear Google My Business</li>
                        <li><i class="fas fa-check"></i> Compartir en redes sociales</li>
                    </ul>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="cta-guide">
                <h3>¿Te parece complicado?</h3>
                <p>No te preocupes, nosotros te ayudamos con todo el proceso. Te guiamos paso a paso y nos encargamos de la parte técnica.</p>
                <div class="cta-buttons">
                    <a href="/#contacto" class="btn btn-primary">Solicitar Ayuda</a>
                    <a href="https://wa.me/542615597977?text=Hola!%20Necesito%20ayuda%20para%20crear%20mi%20primera%20página%20web" 
                       class="btn btn-whatsapp" target="_blank" rel="noopener">
                        <i class="fab fa-whatsapp"></i> Consulta Gratuita
                    </a>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="step-card">
                <h2 style="color: var(--text-primary); text-align: center; margin-bottom: 30px;">❓ Preguntas Frecuentes</h2>
                
                <h3 style="color: var(--text-primary); margin-top: 20px; margin-bottom: 10px;">¿Cuánto cuesta crear una página web?</h3>
                <p style="color: var(--text-secondary); margin-bottom: 15px;">Los precios varían según la complejidad. Una página básica puede costar desde $50,000 ARS, pero te incluimos todo: diseño, desarrollo, hosting y capacitación.</p>
                
                <h3 style="color: var(--text-primary); margin-top: 20px; margin-bottom: 10px;">¿Cuánto tiempo toma?</h3>
                <p style="color: var(--text-secondary); margin-bottom: 15px;">Una página web básica puede estar lista en 2-4 semanas. Los tiempos dependen de la cantidad de contenido y cambios que necesites.</p>
                
                <h3 style="color: var(--text-primary); margin-top: 20px; margin-bottom: 10px;">¿Necesito saber programar?</h3>
                <p style="color: var(--text-secondary); margin-bottom: 15px;">¡No! Nosotros nos encargamos de toda la parte técnica. Solo necesitas tener claro qué quieres mostrar en tu página.</p>
                
                <h3 style="color: var(--text-primary); margin-top: 20px; margin-bottom: 10px;">¿Puedo cambiar el diseño después?</h3>
                <p style="color: var(--text-secondary); margin-bottom: 15px;">Sí, puedes hacer cambios menores tú mismo o nosotros te ayudamos con cambios más grandes.</p>
                
                <h3 style="color: var(--text-primary); margin-top: 20px; margin-bottom: 10px;">¿Funcionará en móviles?</h3>
                <p style="color: var(--text-secondary); margin-bottom: 15px;">¡Por supuesto! Todas nuestras páginas son responsive y se ven perfectas en cualquier dispositivo.</p>
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
                            <p class="footer-tagline">Tu primera página web profesional</p>
                        </div>
                        <p class="footer-description">Especialistas en ayudar a principiantes a crear su primera página web. Te guiamos en cada paso del proceso.</p>
                    </div>
                    
                    <div class="footer-section">
                        <h4>Enlaces Útiles</h4>
                        <ul class="footer-links">
                            <li><a href="/"><i class="fas fa-home"></i> Inicio</a></li>
                            <li><a href="/guia-primera-pagina-web.php"><i class="fas fa-book"></i> Guía Paso a Paso</a></li>
                            <li><a href="/#contacto"><i class="fas fa-envelope"></i> Contacto</a></li>
                        </ul>
                    </div>
                    
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
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <div class="footer-bottom-content">
                    <div class="footer-bottom-left">
                        <p>&copy; <?php echo date("Y"); ?> <?php echo SITE_NAME; ?>. Todos los derechos reservados.</p>
                    </div>
                    <div class="footer-bottom-right">
                        <p>Especialistas en primera página web - Mendoza, Argentina</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Botón flotante de WhatsApp -->
    <div class="whatsapp-float">
        <a href="https://wa.me/542615597977?text=Hola!%20Estoy%20leyendo%20la%20guía%20de%20primera%20página%20web%20y%20necesito%20ayuda" 
           class="whatsapp-float-btn" target="_blank" rel="noopener" title="Consulta sobre primera página web">
            <i class="fab fa-whatsapp"></i>
        </a>
        <div class="whatsapp-tooltip">
            <span>¿Necesitas ayuda con tu primera página web?</span>
            <div class="whatsapp-tooltip-arrow"></div>
        </div>
    </div>

    <script src="assets/js/main.js"></script>
</body>
</html>
