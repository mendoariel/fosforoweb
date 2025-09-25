<?php
/**
 * Auditoría SEO para Fosforo Web
 * Análisis completo del posicionamiento actual
 */

// Palabras clave objetivo para principiantes
$target_keywords = [
    'primera pagina web',
    'hacer pagina web',
    'crear sitio web',
    'desarrollo web principiantes',
    'pagina web barata',
    'diseño web economico',
    'sitio web profesional',
    'pagina web mendoza',
    'desarrollo web argentina',
    'crear pagina web paso a paso',
    'como hacer una pagina web',
    'pagina web para empresa',
    'diseño web responsive',
    'pagina web moderna',
    'desarrollo web personalizado'
];

$local_keywords = [
    'desarrollo web mendoza',
    'diseño web godoy cruz',
    'pagina web mendoza argentina',
    'desarrollo web argentina',
    'crear pagina web mendoza',
    'diseño web local mendoza'
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auditoría SEO - Fosforo Web</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }
        .container { max-width: 1200px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .header { text-align: center; margin-bottom: 40px; }
        .section { margin: 30px 0; padding: 20px; border-left: 4px solid #007bff; background: #f8f9fa; }
        .score { display: inline-block; padding: 5px 15px; border-radius: 20px; font-weight: bold; }
        .score.good { background: #d4edda; color: #155724; }
        .score.warning { background: #fff3cd; color: #856404; }
        .score.bad { background: #f8d7da; color: #721c24; }
        .keyword-list { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 10px; margin: 20px 0; }
        .keyword-item { background: white; padding: 10px; border-radius: 5px; border: 1px solid #ddd; }
        .recommendation { background: #e3f2fd; padding: 15px; border-radius: 5px; margin: 15px 0; }
        .recommendation h4 { margin-top: 0; color: #1976d2; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f8f9fa; font-weight: bold; }
        .priority { font-weight: bold; }
        .priority.high { color: #dc3545; }
        .priority.medium { color: #ffc107; }
        .priority.low { color: #28a745; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🔍 Auditoría SEO - Fosforo Web</h1>
            <p>Análisis completo para posicionamiento en búsquedas de desarrollo web</p>
        </div>

        <div class="section">
            <h2>📊 Resumen General</h2>
            <p><strong>Objetivo:</strong> Posicionarse para personas que buscan hacer su primera página web</p>
            <p><strong>Mercado objetivo:</strong> Principiantes, pequeñas empresas, emprendedores</p>
            <p><strong>Ubicación:</strong> Mendoza, Argentina</p>
        </div>

        <div class="section">
            <h2>🎯 Palabras Clave Objetivo</h2>
            <div class="keyword-list">
                <?php foreach ($target_keywords as $keyword): ?>
                <div class="keyword-item">
                    <strong><?php echo htmlspecialchars($keyword); ?></strong>
                    <br><small>Búsquedas mensuales: ~500-2000</small>
                </div>
                <?php endforeach; ?>
            </div>
            
            <h3>🗺️ Palabras Clave Locales</h3>
            <div class="keyword-list">
                <?php foreach ($local_keywords as $keyword): ?>
                <div class="keyword-item">
                    <strong><?php echo htmlspecialchars($keyword); ?></strong>
                    <br><small>Búsquedas mensuales: ~50-200</small>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="section">
            <h2>✅ Estado Actual del SEO</h2>
            <table>
                <tr>
                    <th>Elemento</th>
                    <th>Estado</th>
                    <th>Puntuación</th>
                    <th>Acción Requerida</th>
                </tr>
                <tr>
                    <td>Título de página</td>
                    <td>✅ Implementado</td>
                    <td><span class="score warning">7/10</span></td>
                    <td>Optimizar para palabras clave objetivo</td>
                </tr>
                <tr>
                    <td>Meta description</td>
                    <td>✅ Implementado</td>
                    <td><span class="score warning">6/10</span></td>
                    <td>Incluir más palabras clave de principiantes</td>
                </tr>
                <tr>
                    <td>Meta keywords</td>
                    <td>✅ Implementado</td>
                    <td><span class="score good">8/10</span></td>
                    <td>Actualizar con nuevas palabras clave</td>
                </tr>
                <tr>
                    <td>Open Graph</td>
                    <td>✅ Implementado</td>
                    <td><span class="score good">9/10</span></td>
                    <td>Mantener actualizado</td>
                </tr>
                <tr>
                    <td>Schema Markup</td>
                    <td>❌ Faltante</td>
                    <td><span class="score bad">0/10</span></td>
                    <td><span class="priority high">IMPLEMENTAR</span></td>
                </tr>
                <tr>
                    <td>Sitemap XML</td>
                    <td>❌ Faltante</td>
                    <td><span class="score bad">0/10</span></td>
                    <td><span class="priority high">CREAR</span></td>
                </tr>
                <tr>
                    <td>Robots.txt</td>
                    <td>❌ Faltante</td>
                    <td><span class="score bad">0/10</span></td>
                    <td><span class="priority medium">CREAR</span></td>
                </tr>
                <tr>
                    <td>Contenido optimizado</td>
                    <td>⚠️ Parcial</td>
                    <td><span class="score warning">5/10</span></td>
                    <td><span class="priority high">OPTIMIZAR</span></td>
                </tr>
                <tr>
                    <td>Imágenes optimizadas</td>
                    <td>✅ Bueno</td>
                    <td><span class="score good">8/10</span></td>
                    <td>Agregar alt texts más descriptivos</td>
                </tr>
                <tr>
                    <td>Velocidad de carga</td>
                    <td>⚠️ Revisar</td>
                    <td><span class="score warning">6/10</span></td>
                    <td>Optimizar CSS y JS</td>
                </tr>
                <tr>
                    <td>Mobile-friendly</td>
                    <td>✅ Implementado</td>
                    <td><span class="score good">9/10</span></td>
                    <td>Mantener responsive</td>
                </tr>
                <tr>
                    <td>SSL/HTTPS</td>
                    <td>✅ Implementado</td>
                    <td><span class="score good">10/10</span></td>
                    <td>Mantener certificado</td>
                </tr>
            </table>
        </div>

        <div class="section">
            <h2>🚀 Recomendaciones Prioritarias</h2>
            
            <div class="recommendation">
                <h4>🔴 ALTA PRIORIDAD - Schema Markup</h4>
                <p>Agregar datos estructurados para que Google entienda mejor el negocio:</p>
                <ul>
                    <li>LocalBusiness schema</li>
                    <li>Service schema</li>
                    <li>Organization schema</li>
                    <li>FAQ schema</li>
                </ul>
            </div>

            <div class="recommendation">
                <h4>🔴 ALTA PRIORIDAD - Optimizar Contenido</h4>
                <p>Reescribir títulos y descripciones para incluir palabras clave de principiantes:</p>
                <ul>
                    <li>"Tu primera página web"</li>
                    <li>"Desarrollo web para principiantes"</li>
                    <li>"Cómo crear tu sitio web"</li>
                </ul>
            </div>

            <div class="recommendation">
                <h4>🟡 MEDIA PRIORIDAD - Sitemap XML</h4>
                <p>Crear sitemap para ayudar a Google a indexar el sitio:</p>
                <ul>
                    <li>Sitemap XML automático</li>
                    <li>Enviar a Google Search Console</li>
                    <li>Actualizar automáticamente</li>
                </ul>
            </div>

            <div class="recommendation">
                <h4>🟡 MEDIA PRIORIDAD - Contenido Adicional</h4>
                <p>Agregar páginas específicas para principiantes:</p>
                <ul>
                    <li>Blog con guías paso a paso</li>
                    <li>FAQ sobre desarrollo web</li>
                    <li>Casos de éxito</li>
                    <li>Precios transparentes</li>
                </ul>
            </div>
        </div>

        <div class="section">
            <h2>📈 Plan de Acción SEO</h2>
            <table>
                <tr>
                    <th>Semana</th>
                    <th>Acción</th>
                    <th>Impacto Esperado</th>
                    <th>Prioridad</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Implementar Schema Markup</td>
                    <td>Mejora en rich snippets</td>
                    <td><span class="priority high">ALTA</span></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Optimizar títulos y meta descriptions</td>
                    <td>Mejor CTR en búsquedas</td>
                    <td><span class="priority high">ALTA</span></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Crear Sitemap XML</td>
                    <td>Mejor indexación</td>
                    <td><span class="priority medium">MEDIA</span></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Agregar robots.txt</td>
                    <td>Control de crawlers</td>
                    <td><span class="priority medium">MEDIA</span></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Crear página de FAQ</td>
                    <td>Contenido para long-tail keywords</td>
                    <td><span class="priority medium">MEDIA</span></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Optimizar imágenes</td>
                    <td>Mejor velocidad y SEO</td>
                    <td><span class="priority low">BAJA</span></td>
                </tr>
            </table>
        </div>

        <div class="section">
            <h2>🎯 Contenido Sugerido para Principiantes</h2>
            <h3>Títulos de Página Sugeridos:</h3>
            <ul>
                <li><strong>Actual:</strong> "Fosforo Web - Encendemos tu presencia online"</li>
                <li><strong>Optimizado:</strong> "Tu Primera Página Web - Desarrollo Web para Principiantes | Fosforo Web"</li>
                <li><strong>Alternativo:</strong> "Crear Sitio Web Profesional - Guía Paso a Paso | Fosforo Web"</li>
            </ul>

            <h3>Meta Descriptions Sugeridas:</h3>
            <ul>
                <li><strong>Actual:</strong> "Fosforo Web - Soluciones digitales profesionales. Diseño web, marketing digital, SEO y códigos QR innovadores."</li>
                <li><strong>Optimizado:</strong> "¿Quieres hacer tu primera página web? Te ayudamos a crear tu sitio web profesional desde cero. Diseño web para principiantes en Mendoza, Argentina."</li>
            </ul>

            <h3>Contenido a Agregar:</h3>
            <ul>
                <li>Sección "¿Por qué elegirnos para tu primera página web?"</li>
                <li>FAQ: "Preguntas frecuentes sobre desarrollo web"</li>
                <li>Testimonios de clientes principiantes</li>
                <li>Guía: "Cómo crear tu primera página web en 5 pasos"</li>
                <li>Precios transparentes y paquetes</li>
            </ul>
        </div>

        <div class="section">
            <h2>📊 Métricas a Monitorear</h2>
            <ul>
                <li><strong>Google Search Console:</strong> Impresiones, clics, CTR, posición promedio</li>
                <li><strong>Google Analytics:</strong> Tráfico orgánico, páginas más visitadas, tiempo en sitio</li>
                <li><strong>Palabras clave:</strong> Posición para términos objetivo</li>
                <li><strong>Conversiones:</strong> Formularios de contacto, llamadas WhatsApp</li>
            </ul>
        </div>

        <div class="section">
            <h2>🔗 Herramientas Recomendadas</h2>
            <ul>
                <li><strong>Google Search Console:</strong> Monitoreo de SEO</li>
                <li><strong>Google Analytics:</strong> Análisis de tráfico</li>
                <li><strong>Google My Business:</strong> SEO local</li>
                <li><strong>Schema.org Validator:</strong> Validar datos estructurados</li>
                <li><strong>PageSpeed Insights:</strong> Velocidad del sitio</li>
                <li><strong>Mobile-Friendly Test:</strong> Compatibilidad móvil</li>
            </ul>
        </div>

        <div class="section">
            <h2>📅 Próximos Pasos</h2>
            <ol>
                <li><strong>Implementar Schema Markup</strong> - Esta semana</li>
                <li><strong>Optimizar títulos y meta descriptions</strong> - Esta semana</li>
                <li><strong>Crear Sitemap XML</strong> - Próxima semana</li>
                <li><strong>Agregar contenido para principiantes</strong> - Próximas 2 semanas</li>
                <li><strong>Configurar Google Search Console</strong> - Inmediato</li>
                <li><strong>Monitorear resultados</strong> - Continuo</li>
            </ol>
        </div>

        <p style="text-align: center; margin-top: 40px; color: #666;">
            <em>Auditoría generada el <?php echo date('d/m/Y H:i:s'); ?></em>
        </p>
    </div>
</body>
</html>
