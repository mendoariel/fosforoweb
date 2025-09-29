<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Web Lista en 72 Horas - Servicio Express | Fosforo Web</title>
    
    <!-- Meta Description -->
    <meta name="description" content="¿Necesitas tu página web YA? Te entregamos tu sitio web profesional en solo 72 horas. Servicio express para emprendedores urgentes. ¡Contáctanos ahora!">
    
    <!-- Meta Keywords -->
    <meta name="keywords" content="página web 72 horas, sitio web express, desarrollo web urgente, página web rápida, sitio web en 3 días, desarrollo web express, página web inmediata">
    
    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://fosforoweb.com.ar/pagina-web-72-horas.php">
    <meta property="og:title" content="Página Web Lista en 72 Horas - Servicio Express">
    <meta property="og:description" content="¿Necesitas tu página web YA? Te entregamos tu sitio web profesional en solo 72 horas. Servicio express para emprendedores urgentes.">
    <meta property="og:image" content="https://fosforoweb.com.ar/assets/images/qr-logo-fosforo.svg">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="favicon.ico?v=2">
    <link rel="icon" type="image/svg+xml" href="favicon.svg?v=2">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/css/style-modern.css?v=1.2">
    <link rel="stylesheet" href="assets/css/colors.css?v=1.2">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <!-- Schema Markup para Servicio Express -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Service",
        "name": "Página Web Lista en 72 Horas",
        "description": "Servicio express de desarrollo web que entrega sitios profesionales en solo 72 horas",
        "provider": {
            "@type": "LocalBusiness",
            "name": "Fosforo Web",
            "address": {
                "@type": "PostalAddress",
                "addressLocality": "Mendoza",
                "addressCountry": "Argentina"
            }
        },
        "offers": {
            "@type": "Offer",
            "name": "Servicio Express 72 Horas",
            "description": "Página web profesional lista en 72 horas",
            "price": "80000",
            "priceCurrency": "ARS",
            "availability": "InStock",
            "validFrom": "2024-01-01"
        }
    }
    </script>
    
    <style>
        .express-hero {
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 50%, #ff6b35 100%);
            color: white;
            padding: 100px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .express-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            animation: float 20s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .express-hero .hero-content {
            position: relative;
            z-index: 2;
        }
        
        .countdown-timer {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 30px;
            margin: 40px auto;
            max-width: 600px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .timer-display {
            font-size: 3rem;
            font-weight: 900;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .urgency-badge {
            background: #ff1744;
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: bold;
            display: inline-block;
            margin: 20px 0;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .process-timeline-72h {
            background: white;
            padding: 60px 0;
        }
        
        .timeline-72h {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            max-width: 1000px;
            margin: 0 auto;
        }
        
        .timeline-step-72h {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 20px;
            text-align: center;
            position: relative;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        
        .timeline-step-72h::before {
            content: '';
            position: absolute;
            top: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 20px;
            height: 20px;
            background: #ff6b35;
            border-radius: 50%;
            border: 4px solid white;
        }
        
        .step-time {
            background: rgba(255, 255, 255, 0.2);
            padding: 5px 15px;
            border-radius: 15px;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 15px;
            display: inline-block;
        }
        
        .guarantee-section {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            padding: 60px 0;
            text-align: center;
        }
        
        .guarantee-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin: 40px 0;
        }
        
        .guarantee-item {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .testimonials-express {
            background: #f8f9fa;
            padding: 60px 0;
        }
        
        .testimonial-card {
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin: 20px 0;
            position: relative;
        }
        
        .testimonial-card::before {
            content: '"';
            position: absolute;
            top: -10px;
            left: 20px;
            font-size: 60px;
            color: #ff6b35;
            font-weight: bold;
        }
        
        .pricing-express {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 60px 0;
        }
        
        .pricing-card-express {
            background: white;
            color: #333;
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
            position: relative;
            max-width: 500px;
            margin: 0 auto;
        }
        
        .pricing-card-express::before {
            content: "EXPRESS";
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            background: #ff6b35;
            color: white;
            padding: 10px 30px;
            border-radius: 25px;
            font-weight: bold;
            font-size: 14px;
        }
        
        .price-express {
            font-size: 4rem;
            font-weight: 900;
            color: #ff6b35;
            margin: 20px 0;
        }
        
        .cta-express {
            background: #ff6b35;
            color: white;
            padding: 20px 40px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            font-size: 18px;
            display: inline-block;
            margin: 20px 10px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(255, 107, 53, 0.3);
        }
        
        .cta-express:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(255, 107, 53, 0.4);
            color: white;
        }
        
        .urgency-stats {
            background: #1a1a1a;
            color: white;
            padding: 40px 0;
            text-align: center;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin: 30px 0;
        }
        
        .stat-item {
            text-align: center;
        }
        
        .stat-number {
            font-size: 3rem;
            font-weight: 900;
            color: #ff6b35;
            margin-bottom: 10px;
        }
        
        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
            overflow: hidden;
        }
        
        .floating-element {
            position: absolute;
            color: rgba(255, 255, 255, 0.1);
            font-size: 2rem;
            animation: floatRandom 15s infinite linear;
        }
        
        @keyframes floatRandom {
            0% { transform: translateY(100vh) rotate(0deg); }
            100% { transform: translateY(-100px) rotate(360deg); }
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
                        <a href="/pagina-web-72-horas.php" class="nav-link active">72 Horas</a>
                    </li>
                    <li class="nav-item">
                        <a href="/precios-pagina-web.php" class="nav-link">Precios</a>
                    </li>
                    <li class="nav-item">
                        <a href="/#contacto" class="nav-link">Contacto</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Express Hero Section -->
    <section class="express-hero">
        <div class="floating-elements">
            <div class="floating-element" style="left: 10%; animation-delay: 0s;">⚡</div>
            <div class="floating-element" style="left: 20%; animation-delay: 2s;">🚀</div>
            <div class="floating-element" style="left: 30%; animation-delay: 4s;">⚡</div>
            <div class="floating-element" style="left: 40%; animation-delay: 6s;">🚀</div>
            <div class="floating-element" style="left: 50%; animation-delay: 8s;">⚡</div>
            <div class="floating-element" style="left: 60%; animation-delay: 10s;">🚀</div>
            <div class="floating-element" style="left: 70%; animation-delay: 12s;">⚡</div>
            <div class="floating-element" style="left: 80%; animation-delay: 14s;">🚀</div>
            <div class="floating-element" style="left: 90%; animation-delay: 16s;">⚡</div>
        </div>
        
        <div class="container">
            <div class="hero-content">
                <div class="urgency-badge">🔥 SERVICIO EXPRESS 🔥</div>
                <h1 class="hero-title" style="font-size: 3.5rem; font-weight: 900; margin-bottom: 20px; text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">
                    Tu Página Web <span style="color: #ffeb3b;">LISTA EN 72 HORAS</span>
                </h1>
                <p class="hero-description" style="font-size: 1.3rem; margin-bottom: 30px; text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                    ¿Necesitas tu página web YA? Te entregamos un sitio web profesional, 
                    responsive y optimizado en solo 72 horas. Sin excusas, sin demoras.
                </p>
                
                <div class="countdown-timer">
                    <div class="timer-display" id="countdown">72:00:00</div>
                    <p style="font-size: 1.2rem; margin: 0;">Tiempo promedio de entrega</p>
                </div>
                
                <div class="hero-buttons">
                    <a href="#contacto-express" class="cta-express">
                        <i class="fas fa-rocket"></i> ¡QUIERO MI PÁGINA YA!
                    </a>
                    <a href="https://wa.me/542615597977?text=Hola!%20Necesito%20mi%20página%20web%20en%2072%20horas%20URGENTE" 
                       class="cta-express" style="background: #25d366;" target="_blank" rel="noopener">
                        <i class="fab fa-whatsapp"></i> WhatsApp Express
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Urgency Stats -->
    <section class="urgency-stats">
        <div class="container">
            <h2 style="text-align: center; margin-bottom: 40px; font-size: 2.5rem;">¿Por qué 72 horas?</h2>
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">72</div>
                    <p>Horas de entrega garantizada</p>
                </div>
                <div class="stat-item">
                    <div class="stat-number">100%</div>
                    <p>Clientes satisfechos</p>
                </div>
                <div class="stat-item">
                    <div class="stat-number">24/7</div>
                    <p>Soporte durante el proceso</p>
                </div>
                <div class="stat-item">
                    <div class="stat-number">0</div>
                    <p>Demoras en entregas</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Timeline -->
    <section class="process-timeline-72h">
        <div class="container">
            <h2 style="text-align: center; margin-bottom: 50px; font-size: 2.5rem; color: #333;">¿Cómo funciona?</h2>
            <div class="timeline-72h">
                <div class="timeline-step-72h">
                    <div class="step-time">HORA 0</div>
                    <h3>📞 Consulta Express</h3>
                    <p>Llamada de 15 minutos para entender exactamente qué necesitas. Sin vueltas, directo al grano.</p>
                </div>
                
                <div class="timeline-step-72h">
                    <div class="step-time">HORA 6</div>
                    <h3>🎨 Diseño Aprobado</h3>
                    <p>Te mostramos 3 opciones de diseño. Tú eliges, nosotros ejecutamos. Sin cambios después.</p>
                </div>
                
                <div class="timeline-step-72h">
                    <div class="step-time">HORA 24</div>
                    <h3>⚡ Desarrollo Express</h3>
                    <p>Nuestro equipo trabaja 24/7 para tener tu sitio listo. Te enviamos updates cada 12 horas.</p>
                </div>
                
                <div class="timeline-step-72h">
                    <div class="step-time">HORA 72</div>
                    <h3>🚀 ¡LISTO!</h3>
                    <p>Tu página web está online, optimizada y funcionando perfectamente. ¡A celebrar!</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Guarantee Section -->
    <section class="guarantee-section">
        <div class="container">
            <h2 style="text-align: center; margin-bottom: 40px; font-size: 2.5rem;">Garantías que respaldan nuestro servicio</h2>
            <div class="guarantee-grid">
                <div class="guarantee-item">
                    <img src="assets/images/flayers-01.png" alt="Garantía de Tiempo" style="width: 100%; max-width: 150px; height: auto; margin-bottom: 20px; border-radius: 10px;">
                    <h3>Garantía de Tiempo</h3>
                    <p>Si no entregamos en 72 horas, te devolvemos el 50% del dinero. Sin excusas.</p>
                </div>
                
                <div class="guarantee-item">
                    <img src="assets/images/flayers-02.png" alt="Garantía de Calidad" style="width: 100%; max-width: 150px; height: auto; margin-bottom: 20px; border-radius: 10px;">
                    <h3>Garantía de Calidad</h3>
                    <p>Tu sitio será responsive, rápido y optimizado para SEO. No aceptamos menos.</p>
                </div>
                
                <div class="guarantee-item">
                    <img src="assets/images/flayers-03.png" alt="Soporte 24/7" style="width: 100%; max-width: 150px; height: auto; margin-bottom: 20px; border-radius: 10px;">
                    <h3>Soporte 24/7</h3>
                    <p>Estamos disponibles durante todo el proceso. WhatsApp, email, teléfono.</p>
                </div>
                
                <div class="guarantee-item">
                    <i class="fas fa-money-bill-wave" style="font-size: 3rem; margin-bottom: 20px;"></i>
                    <h3>Garantía de Satisfacción</h3>
                    <p>Si no estás 100% conforme, trabajamos hasta que lo estés. Sin costo extra.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials-express">
        <div class="container">
            <h2 style="text-align: center; margin-bottom: 50px; font-size: 2.5rem; color: #333;">Lo que dicen nuestros clientes express</h2>
            
            <div class="testimonial-card">
                <p style="font-size: 1.2rem; margin-bottom: 20px; font-style: italic;">
                    "Increíble. Necesitaba mi página web para una presentación importante y la tenía lista en 48 horas. 
                    El equipo trabajó día y noche. ¡Profesionales de verdad!"
                </p>
                <div style="display: flex; align-items: center; gap: 15px;">
                    <div style="width: 50px; height: 50px; background: #ff6b35; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">M</div>
                    <div>
                        <strong>María González</strong><br>
                        <small>Emprendedora - Mendoza</small>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-card">
                <p style="font-size: 1.2rem; margin-bottom: 20px; font-style: italic;">
                    "Pensé que era imposible tener una página web profesional en 3 días. 
                    No solo la tuvieron lista, sino que superó mis expectativas. ¡Recomendado 100%!"
                </p>
                <div style="display: flex; align-items: center; gap: 15px;">
                    <div style="width: 50px; height: 50px; background: #ff6b35; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">C</div>
                    <div>
                        <strong>Carlos Rodríguez</strong><br>
                        <small>Consultor - Buenos Aires</small>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-card">
                <p style="font-size: 1.2rem; margin-bottom: 20px; font-style: italic;">
                    "El servicio express salvó mi negocio. Tenía una oportunidad de negocio que no podía perder 
                    y necesitaba presencia online inmediata. ¡72 horas después estaba vendiendo online!"
                </p>
                <div style="display: flex; align-items: center; gap: 15px;">
                    <div style="width: 50px; height: 50px; background: #ff6b35; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">A</div>
                    <div>
                        <strong>Ana Martínez</strong><br>
                        <small>Comerciante - Córdoba</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Express -->
    <section class="pricing-express">
        <div class="container">
            <h2 style="text-align: center; margin-bottom: 50px; font-size: 2.5rem;">Inversión Express</h2>
            <div class="pricing-card-express">
                <h3 style="font-size: 2rem; margin-bottom: 20px;">PÁGINA WEB EXPRESS</h3>
                <div style="font-size: 2rem; color: #ff6b35; font-weight: bold; margin: 20px 0;">Consulta personalizada</div>
                <p style="font-size: 1.2rem; margin-bottom: 30px; color: #666;">Presupuesto según tus necesidades específicas</p>
                
                <div style="text-align: left; margin: 30px 0;">
                    <h4 style="color: #ff6b35; margin-bottom: 20px;">✅ Incluye:</h4>
                    <ul style="list-style: none; padding: 0;">
                        <li style="margin: 10px 0; display: flex; align-items: center;"><i class="fas fa-check" style="color: #28a745; margin-right: 10px;"></i> Hasta 5 páginas profesionales</li>
                        <li style="margin: 10px 0; display: flex; align-items: center;"><i class="fas fa-check" style="color: #28a745; margin-right: 10px;"></i> Diseño responsive (móvil + desktop)</li>
                        <li style="margin: 10px 0; display: flex; align-items: center;"><i class="fas fa-check" style="color: #28a745; margin-right: 10px;"></i> Formulario de contacto funcional</li>
                        <li style="margin: 10px 0; display: flex; align-items: center;"><i class="fas fa-check" style="color: #28a745; margin-right: 10px;"></i> Optimización SEO básica</li>
                        <li style="margin: 10px 0; display: flex; align-items: center;"><i class="fas fa-check" style="color: #28a745; margin-right: 10px;"></i> Dominio .com.ar incluido</li>
                        <li style="margin: 10px 0; display: flex; align-items: center;"><i class="fas fa-check" style="color: #28a745; margin-right: 10px;"></i> Hosting por 1 año</li>
                        <li style="margin: 10px 0; display: flex; align-items: center;"><i class="fas fa-check" style="color: #28a745; margin-right: 10px;"></i> 1 casilla de correo profesional</li>
                        <li style="margin: 10px 0; display: flex; align-items: center;"><i class="fas fa-check" style="color: #28a745; margin-right: 10px;"></i> Capacitación express (30 min)</li>
                        <li style="margin: 10px 0; display: flex; align-items: center;"><i class="fas fa-check" style="color: #28a745; margin-right: 10px;"></i> Soporte por 3 meses</li>
                        <li style="margin: 10px 0; display: flex; align-items: center;"><i class="fas fa-check" style="color: #28a745; margin-right: 10px;"></i> <strong>ENTREGA EN 72 HORAS GARANTIZADA</strong></li>
                    </ul>
                </div>
                
                <div style="background: #ff6b35; color: white; padding: 20px; border-radius: 15px; margin: 30px 0;">
                    <h4 style="margin: 0 0 10px 0;">🔥 OFERTA LIMITADA 🔥</h4>
                    <p style="margin: 0; font-size: 1.1rem;">Solo 5 clientes por mes pueden acceder a este servicio express. 
                    ¡No pierdas tu lugar!</p>
                </div>
                
                <div style="text-align: center;">
                    <a href="#contacto-express" class="cta-express" style="font-size: 1.3rem; padding: 25px 50px;">
                        <i class="fas fa-rocket"></i> ¡QUIERO MI PÁGINA YA!
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Express -->
    <section id="contacto-express" class="contact" style="background: #1a1a1a; color: white; padding: 80px 0;">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title" style="color: white;">¿Listo para tu página web en 72 horas?</h2>
                <p class="section-subtitle" style="color: #ccc;">Completa el formulario y te contactamos en menos de 1 hora</p>
            </div>
            
            <div class="contact-content">
                <div class="contact-info" style="color: white;">
                    <div class="contact-item">
                        <i class="fas fa-clock" style="color: #ff6b35;"></i>
                        <div>
                            <h4 style="color: white;">Respuesta Express</h4>
                            <p>Te contactamos en menos de 1 hora</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-rocket" style="color: #ff6b35;"></i>
                        <div>
                            <h4 style="color: white;">Entrega Garantizada</h4>
                            <p>72 horas o te devolvemos el 50%</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-headset" style="color: #ff6b35;"></i>
                        <div>
                            <h4 style="color: white;">Soporte 24/7</h4>
                            <p>Estamos disponibles todo el tiempo</p>
                        </div>
                    </div>
                </div>
                
                <form class="contact-form" action="contact-handler.php" method="POST" style="background: white; color: #333; padding: 40px; border-radius: 20px;">
                    <input type="hidden" name="service_type" value="72_horas_express">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Tu nombre completo" required style="padding: 15px; border-radius: 10px; border: 2px solid #ddd;">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Tu email" required style="padding: 15px; border-radius: 10px; border: 2px solid #ddd;">
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" placeholder="Tu teléfono (WhatsApp preferido)" required style="padding: 15px; border-radius: 10px; border: 2px solid #ddd;">
                    </div>
                    <div class="form-group">
                        <textarea name="message" placeholder="Cuéntanos sobre tu proyecto. ¿Qué tipo de página necesitas? ¿Cuándo la necesitas?" rows="5" required style="padding: 15px; border-radius: 10px; border: 2px solid #ddd;"></textarea>
                    </div>
                    <button type="submit" class="cta-express" style="width: 100%; font-size: 1.2rem; padding: 20px;">
                        <i class="fas fa-rocket"></i> ¡ENVIAR SOLICITUD EXPRESS!
                    </button>
                </form>
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
                            <p class="footer-tagline">Página web lista en 72 horas</p>
                        </div>
                        <p class="footer-description">Servicio express de desarrollo web para emprendedores que necesitan resultados inmediatos.</p>
                    </div>
                    
                    <div class="footer-section">
                        <h4>Servicios Express</h4>
                        <ul class="footer-links">
                            <li><a href="/pagina-web-72-horas.php"><i class="fas fa-rocket"></i> Página Web 72h</a></li>
                            <li><a href="/precios-pagina-web.php"><i class="fas fa-dollar-sign"></i> Precios</a></li>
                            <li><a href="/#contacto"><i class="fas fa-envelope"></i> Contacto</a></li>
                        </ul>
                    </div>
                    
                    <div class="footer-section">
                        <h4>Contacto Express</h4>
                        <div class="contact-info">
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <div>
                                    <span>Teléfono: </span>
                                    <a href="tel:+542615597977">+54 261 559-7977</a>
                                </div>
                            </div>
                            <div class="contact-item">
                                <i class="fab fa-whatsapp"></i>
                                <div>
                                    <span>WhatsApp: </span>
                                    <a href="https://wa.me/542615597977?text=Hola!%20Necesito%20mi%20página%20web%20en%2072%20horas%20URGENTE" target="_blank">+54 261 559-7977</a>
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
                        <p>Servicio Express - Mendoza, Argentina</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Botón flotante de WhatsApp Express -->
    <div class="whatsapp-float">
        <a href="https://wa.me/542615597977?text=Hola!%20Necesito%20mi%20página%20web%20en%2072%20horas%20URGENTE" 
           class="whatsapp-float-btn" target="_blank" rel="noopener" title="WhatsApp Express">
            <i class="fab fa-whatsapp"></i>
        </a>
        <div class="whatsapp-tooltip">
            <span>¡72 horas express!</span>
            <div class="whatsapp-tooltip-arrow"></div>
        </div>
    </div>

    <script src="assets/js/main.js"></script>
    
    <script>
        // Countdown timer effect
        function updateCountdown() {
            const countdownElement = document.getElementById('countdown');
            if (countdownElement) {
                countdownElement.style.transform = 'scale(1.1)';
                setTimeout(() => {
                    countdownElement.style.transform = 'scale(1)';
                }, 200);
            }
        }
        
        // Update countdown every 5 seconds for visual effect
        setInterval(updateCountdown, 5000);
        
        // Add urgency to form submission
        document.querySelector('form').addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enviando solicitud express...';
            submitBtn.disabled = true;
        });
    </script>
</body>
</html>
