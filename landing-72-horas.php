<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Web en 72 Horas - Servicio Express | Fosforo Web</title>
    
    <!-- Meta Description -->
    <meta name="description" content="¿Necesitas tu página web YA? Servicio express que entrega tu sitio web profesional en solo 72 horas. Garantía de tiempo o te devolvemos el 50%. ¡Contáctanos ahora!">
    
    <!-- Meta Keywords -->
    <meta name="keywords" content="página web 72 horas, sitio web express, desarrollo web urgente, página web rápida, sitio web en 3 días, desarrollo web express, página web inmediata, servicio express web">
    
    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://fosforoweb.com.ar/landing-72-horas.php">
    <meta property="og:title" content="Página Web en 72 Horas - Servicio Express">
    <meta property="og:description" content="¿Necesitas tu página web YA? Servicio express que entrega tu sitio web profesional en solo 72 horas.">
    <meta property="og:image" content="https://fosforoweb.com.ar/assets/images/qr-logo-fosforo.svg">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="favicon.ico?v=2">
    <link rel="icon" type="image/svg+xml" href="favicon.svg?v=2">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/css/style-modern.css?v=1.2">
    <link rel="stylesheet" href="assets/css/colors.css?v=1.2">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: #333;
            overflow-x: hidden;
        }
        
        .landing-hero {
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 50%, #ff6b35 100%);
            color: white;
            padding: 100px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        
        .landing-hero::before {
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
        
        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .urgency-badge {
            background: #ff1744;
            color: white;
            padding: 15px 30px;
            border-radius: 30px;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 30px;
            animation: pulse 2s infinite;
            font-size: 1.1rem;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .hero-title {
            font-size: 4rem;
            font-weight: 900;
            margin-bottom: 30px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            line-height: 1.2;
        }
        
        .hero-subtitle {
            font-size: 1.5rem;
            margin-bottom: 40px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
            opacity: 0.95;
        }
        
        .countdown-container {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 25px;
            padding: 40px;
            margin: 40px 0;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .countdown-timer {
            font-size: 4rem;
            font-weight: 900;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            color: #ffeb3b;
        }
        
        .countdown-label {
            font-size: 1.3rem;
            margin-bottom: 20px;
        }
        
        .cta-buttons {
            margin-top: 40px;
        }
        
        .cta-primary {
            background: white;
            color: #ff6b35;
            padding: 25px 50px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.3rem;
            display: inline-block;
            margin: 15px;
            transition: all 0.3s ease;
            box-shadow: 0 15px 40px rgba(255, 255, 255, 0.3);
            border: 3px solid white;
        }
        
        .cta-primary:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 50px rgba(255, 255, 255, 0.4);
            color: #ff6b35;
        }
        
        .cta-whatsapp {
            background: #25d366;
            color: white;
            padding: 25px 50px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.3rem;
            display: inline-block;
            margin: 15px;
            transition: all 0.3s ease;
            box-shadow: 0 15px 40px rgba(37, 211, 102, 0.3);
        }
        
        .cta-whatsapp:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 50px rgba(37, 211, 102, 0.4);
            color: white;
        }
        
        .guarantee-section {
            background: #1a1a1a;
            color: white;
            padding: 80px 0;
            text-align: center;
        }
        
        .guarantee-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin: 50px 0;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .guarantee-item {
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            padding: 40px 30px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 20px 40px rgba(255, 107, 53, 0.3);
        }
        
        .guarantee-item i {
            font-size: 4rem;
            margin-bottom: 20px;
            color: white;
        }
        
        .guarantee-item h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: white;
        }
        
        .process-section {
            background: #f8f9fa;
            padding: 80px 0;
        }
        
        .process-timeline {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin: 50px 0;
            max-width: 1000px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .process-step {
            background: white;
            padding: 40px 30px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            position: relative;
            border-top: 5px solid #ff6b35;
        }
        
        .step-number {
            background: #ff6b35;
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.5rem;
            margin: 0 auto 20px;
        }
        
        .step-time {
            background: #ff6b35;
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 20px;
        }
        
        .testimonials-section {
            background: white;
            padding: 80px 0;
        }
        
        .testimonial-card {
            background: #f8f9fa;
            padding: 40px;
            border-radius: 20px;
            margin: 30px 0;
            position: relative;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        
        .testimonial-card::before {
            content: '"';
            position: absolute;
            top: -20px;
            left: 30px;
            font-size: 80px;
            color: #ff6b35;
            font-weight: bold;
            line-height: 1;
        }
        
        .pricing-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 80px 0;
        }
        
        .pricing-card {
            background: white;
            color: #333;
            border-radius: 25px;
            padding: 50px;
            text-align: center;
            box-shadow: 0 25px 50px rgba(0,0,0,0.2);
            position: relative;
            max-width: 600px;
            margin: 0 auto;
        }
        
        .pricing-card::before {
            content: "EXPRESS 72H";
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            background: #ff6b35;
            color: white;
            padding: 15px 40px;
            border-radius: 30px;
            font-weight: bold;
            font-size: 1.1rem;
        }
        
        .price-display {
            font-size: 5rem;
            font-weight: 900;
            color: #ff6b35;
            margin: 30px 0;
        }
        
        .features-list {
            list-style: none;
            padding: 0;
            margin: 40px 0;
            text-align: left;
        }
        
        .features-list li {
            padding: 15px 0;
            display: flex;
            align-items: center;
            font-size: 1.1rem;
            border-bottom: 1px solid #eee;
        }
        
        .features-list i {
            color: #28a745;
            margin-right: 15px;
            width: 25px;
            font-size: 1.2rem;
        }
        
        .contact-section {
            background: #1a1a1a;
            color: white;
            padding: 80px 0;
        }
        
        .contact-form {
            background: white;
            color: #333;
            padding: 50px;
            border-radius: 25px;
            max-width: 600px;
            margin: 0 auto;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 20px;
            border: 2px solid #ddd;
            border-radius: 15px;
            font-size: 1.1rem;
            transition: border-color 0.3s ease;
        }
        
        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #ff6b35;
        }
        
        .submit-btn {
            background: #ff6b35;
            color: white;
            padding: 25px 50px;
            border: none;
            border-radius: 50px;
            font-size: 1.3rem;
            font-weight: bold;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 15px 40px rgba(255, 107, 53, 0.3);
        }
        
        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 50px rgba(255, 107, 53, 0.4);
        }
        
        .urgency-notice {
            background: #ff1744;
            color: white;
            padding: 20px;
            border-radius: 15px;
            margin: 30px 0;
            text-align: center;
            font-weight: bold;
            font-size: 1.2rem;
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
            font-size: 3rem;
            animation: floatRandom 20s infinite linear;
        }
        
        @keyframes floatRandom {
            0% { transform: translateY(100vh) rotate(0deg); }
            100% { transform: translateY(-100px) rotate(360deg); }
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .section-title {
            font-size: 3rem;
            font-weight: 900;
            margin-bottom: 30px;
            text-align: center;
        }
        
        .section-subtitle {
            font-size: 1.3rem;
            margin-bottom: 50px;
            text-align: center;
            opacity: 0.8;
        }
        
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.2rem;
            }
            
            .countdown-timer {
                font-size: 2.5rem;
            }
            
            .cta-primary,
            .cta-whatsapp {
                padding: 20px 30px;
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Landing Hero -->
    <section class="landing-hero">
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
        
        <div class="hero-content">
            <div class="urgency-badge">🔥 SERVICIO EXPRESS - SOLO 5 CLIENTES POR MES 🔥</div>
            
            <h1 class="hero-title">
                Tu Página Web <span style="color: #ffeb3b;">LISTA EN 72 HORAS</span>
            </h1>
            
            <p class="hero-subtitle">
                ¿Necesitas tu página web YA? Te entregamos un sitio web profesional, 
                responsive y optimizado en solo 72 horas. Sin excusas, sin demoras.
            </p>
            
            <div class="countdown-container">
                <div class="countdown-timer" id="countdown">72:00:00</div>
                <div class="countdown-label">Tiempo promedio de entrega</div>
                <p style="font-size: 1.1rem; margin: 0;">Garantía: Si no entregamos en 72 horas, te devolvemos el 50% del dinero</p>
            </div>
            
            <div class="urgency-notice">
                ⚠️ OFERTA LIMITADA: Solo 5 clientes por mes pueden acceder a este servicio express. ¡No pierdas tu lugar!
            </div>
            
            <div class="cta-buttons">
                <a href="#contacto-express" class="cta-primary">
                    <i class="fas fa-rocket"></i> ¡QUIERO MI PÁGINA YA!
                </a>
                <a href="https://wa.me/542615597977?text=Hola!%20Necesito%20mi%20página%20web%20en%2072%20horas%20URGENTE" 
                   class="cta-whatsapp" target="_blank" rel="noopener">
                    <i class="fab fa-whatsapp"></i> WhatsApp Express
                </a>
            </div>
        </div>
    </section>

    <!-- Guarantee Section -->
    <section class="guarantee-section">
        <div class="container">
            <h2 class="section-title" style="color: white;">Garantías que respaldan nuestro servicio</h2>
            <p class="section-subtitle" style="color: rgba(255,255,255,0.8);">No hay excusas, solo resultados</p>
            
            <div class="guarantee-grid">
                <div class="guarantee-item">
                    <img src="assets/images/flayers-01.png" alt="Garantía de Tiempo" style="width: 100%; max-width: 200px; height: auto; margin-bottom: 20px; border-radius: 15px;">
                    <h3>Garantía de Tiempo</h3>
                    <p>Si no entregamos en 72 horas, te devolvemos el 50% del dinero. Sin excusas, sin vueltas.</p>
                </div>
                
                <div class="guarantee-item">
                    <img src="assets/images/flayers-02.png" alt="Garantía de Calidad" style="width: 100%; max-width: 200px; height: auto; margin-bottom: 20px; border-radius: 15px;">
                    <h3>Garantía de Calidad</h3>
                    <p>Tu sitio será responsive, rápido y optimizado para SEO. No aceptamos menos que la excelencia.</p>
                </div>
                
                <div class="guarantee-item">
                    <img src="assets/images/flayers-03.png" alt="Soporte 24/7" style="width: 100%; max-width: 200px; height: auto; margin-bottom: 20px; border-radius: 15px;">
                    <h3>Soporte 24/7</h3>
                    <p>Estamos disponibles durante todo el proceso. WhatsApp, email, teléfono. Siempre contigo.</p>
                </div>
                
                <div class="guarantee-item">
                    <i class="fas fa-money-bill-wave"></i>
                    <h3>Garantía de Satisfacción</h3>
                    <p>Si no estás 100% conforme, trabajamos hasta que lo estés. Sin costo extra.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="process-section">
        <div class="container">
            <h2 class="section-title">¿Cómo funciona nuestro proceso express?</h2>
            <p class="section-subtitle">Un proceso optimizado para entregar resultados en tiempo récord</p>
            
            <div class="process-timeline">
                <div class="process-step">
                    <div class="step-number">1</div>
                    <div class="step-time">HORA 0</div>
                    <h3>📞 Consulta Express</h3>
                    <p>Llamada de 15 minutos para entender exactamente qué necesitas. Sin vueltas, directo al grano.</p>
                </div>
                
                <div class="process-step">
                    <div class="step-number">2</div>
                    <div class="step-time">HORA 6</div>
                    <h3>🎨 Diseño Aprobado</h3>
                    <p>Te mostramos 3 opciones de diseño. Tú eliges, nosotros ejecutamos. Sin cambios después.</p>
                </div>
                
                <div class="process-step">
                    <div class="step-number">3</div>
                    <div class="step-time">HORA 24</div>
                    <h3>⚡ Desarrollo Express</h3>
                    <p>Nuestro equipo trabaja 24/7 para tener tu sitio listo. Te enviamos updates cada 12 horas.</p>
                </div>
                
                <div class="process-step">
                    <div class="step-number">4</div>
                    <div class="step-time">HORA 72</div>
                    <h3>🚀 ¡LISTO!</h3>
                    <p>Tu página web está online, optimizada y funcionando perfectamente. ¡A celebrar!</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials-section">
        <div class="container">
            <h2 class="section-title">Lo que dicen nuestros clientes express</h2>
            <p class="section-subtitle">Resultados reales, testimonios reales</p>
            
            <div class="testimonial-card">
                <p style="font-size: 1.3rem; margin-bottom: 30px; font-style: italic; line-height: 1.6;">
                    "Increíble. Necesitaba mi página web para una presentación importante y la tenía lista en 48 horas. 
                    El equipo trabajó día y noche. ¡Profesionales de verdad! La calidad superó mis expectativas."
                </p>
                <div style="display: flex; align-items: center; gap: 20px;">
                    <div style="width: 60px; height: 60px; background: #ff6b35; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 1.5rem;">M</div>
                    <div>
                        <strong style="font-size: 1.2rem;">María González</strong><br>
                        <small style="color: #666;">Emprendedora - Mendoza</small>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-card">
                <p style="font-size: 1.3rem; margin-bottom: 30px; font-style: italic; line-height: 1.6;">
                    "Pensé que era imposible tener una página web profesional en 3 días. 
                    No solo la tuvieron lista, sino que superó mis expectativas. ¡Recomendado 100%!"
                </p>
                <div style="display: flex; align-items: center; gap: 20px;">
                    <div style="width: 60px; height: 60px; background: #ff6b35; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 1.5rem;">C</div>
                    <div>
                        <strong style="font-size: 1.2rem;">Carlos Rodríguez</strong><br>
                        <small style="color: #666;">Consultor - Buenos Aires</small>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-card">
                <p style="font-size: 1.3rem; margin-bottom: 30px; font-style: italic; line-height: 1.6;">
                    "El servicio express salvó mi negocio. Tenía una oportunidad de negocio que no podía perder 
                    y necesitaba presencia online inmediata. ¡72 horas después estaba vendiendo online!"
                </p>
                <div style="display: flex; align-items: center; gap: 20px;">
                    <div style="width: 60px; height: 60px; background: #ff6b35; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 1.5rem;">A</div>
                    <div>
                        <strong style="font-size: 1.2rem;">Ana Martínez</strong><br>
                        <small style="color: #666;">Comerciante - Córdoba</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="pricing-section">
        <div class="container">
            <h2 class="section-title" style="color: white;">Inversión Express</h2>
            <p class="section-subtitle" style="color: rgba(255,255,255,0.8);">Todo incluido, sin sorpresas</p>
            
            <div class="pricing-card">
                <h3 style="font-size: 2.5rem; margin-bottom: 20px; color: #ff6b35;">PÁGINA WEB EXPRESS</h3>
                <div class="price-display">$80.000</div>
                <p style="font-size: 1.3rem; margin-bottom: 40px; color: #666;">Pesos argentinos - Todo incluido</p>
                
                <ul class="features-list">
                    <li><i class="fas fa-check"></i> Hasta 5 páginas profesionales</li>
                    <li><i class="fas fa-check"></i> Diseño responsive (móvil + desktop)</li>
                    <li><i class="fas fa-check"></i> Formulario de contacto funcional</li>
                    <li><i class="fas fa-check"></i> Optimización SEO básica</li>
                    <li><i class="fas fa-check"></i> Dominio .com.ar incluido</li>
                    <li><i class="fas fa-check"></i> Hosting por 1 año</li>
                    <li><i class="fas fa-check"></i> 1 casilla de correo profesional</li>
                    <li><i class="fas fa-check"></i> Capacitación express (30 min)</li>
                    <li><i class="fas fa-check"></i> Soporte por 3 meses</li>
                    <li><i class="fas fa-check" style="color: #ff6b35; font-weight: bold;"></i> <strong>ENTREGA EN 72 HORAS GARANTIZADA</strong></li>
                </ul>
                
                <div class="urgency-notice" style="margin: 40px 0;">
                    🔥 OFERTA LIMITADA: Solo 5 clientes por mes pueden acceder a este servicio express. ¡No pierdas tu lugar!
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contacto-express" class="contact-section">
        <div class="container">
            <h2 class="section-title" style="color: white;">¿Listo para tu página web en 72 horas?</h2>
            <p class="section-subtitle" style="color: rgba(255,255,255,0.8);">Completa el formulario y te contactamos en menos de 1 hora</p>
            
            <form class="contact-form" action="contact-handler.php" method="POST">
                <input type="hidden" name="service_type" value="72_horas_express">
                
                <div class="form-group">
                    <input type="text" name="name" placeholder="Tu nombre completo" required>
                </div>
                
                <div class="form-group">
                    <input type="email" name="email" placeholder="Tu email" required>
                </div>
                
                <div class="form-group">
                    <input type="text" name="phone" placeholder="Tu teléfono (WhatsApp preferido)" required>
                </div>
                
                <div class="form-group">
                    <textarea name="message" placeholder="Cuéntanos sobre tu proyecto. ¿Qué tipo de página necesitas? ¿Cuándo la necesitas?" rows="5" required></textarea>
                </div>
                
                <button type="submit" class="submit-btn">
                    <i class="fas fa-rocket"></i> ¡ENVIAR SOLICITUD EXPRESS!
                </button>
            </form>
            
            <div style="text-align: center; margin-top: 40px;">
                <p style="color: rgba(255,255,255,0.8); margin-bottom: 20px;">¿Prefieres WhatsApp?</p>
                <a href="https://wa.me/542615597977?text=Hola!%20Necesito%20mi%20página%20web%20en%2072%20horas%20URGENTE" 
                   class="cta-whatsapp" target="_blank" rel="noopener">
                    <i class="fab fa-whatsapp"></i> Chatear por WhatsApp
                </a>
            </div>
        </div>
    </section>

    <!-- Botón flotante de WhatsApp -->
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
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>
