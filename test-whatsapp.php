<?php
/**
 * Archivo de Prueba para WhatsApp
 * Prueba la configuración de WhatsApp sin usar el formulario
 */

require_once 'whatsapp-simple.php';

// Configuración - CAMBIA ESTOS VALORES
$webhookUrl = 'TU_WEBHOOK_URL_AQUI'; // Reemplaza con tu URL real

echo "<h2>🧪 Prueba de WhatsApp - Fosforo Web</h2>";
echo "<hr>";

// Verificar configuración
if ($webhookUrl === 'TU_WEBHOOK_URL_AQUI') {
    echo "<div style='background: #fff3cd; padding: 15px; border-radius: 5px; margin: 20px 0;'>";
    echo "<h3>⚠️ Configuración Pendiente</h3>";
    echo "<p>Para probar WhatsApp, necesitas configurar un webhook:</p>";
    echo "<ol>";
    echo "<li><strong>Zapier:</strong> Crea un Zap con Webhook → WhatsApp</li>";
    echo "<li><strong>Make.com:</strong> Crea un Scenario con Webhook → WhatsApp</li>";
    echo "<li><strong>IFTTT:</strong> Crea un Applet con Webhook → WhatsApp</li>";
    echo "</ol>";
    echo "<p><strong>Luego edita este archivo y cambia la URL del webhook.</strong></p>";
    echo "</div>";
    
    echo "<h3>📋 Pasos para Zapier (Recomendado):</h3>";
    echo "<ol>";
    echo "<li>Ve a <a href='https://zapier.com' target='_blank'>zapier.com</a></li>";
    echo "<li>Crea una cuenta gratuita</li>";
    echo "<li>Haz click en 'Create Zap'</li>";
    echo "<li><strong>Trigger:</strong> Webhooks by Zapier → Catch Hook</li>";
    echo "<li><strong>Action:</strong> WhatsApp → Send Message</li>";
    echo "<li>Configura tu WhatsApp Business</li>";
    echo "<li>Copia la URL del webhook</li>";
    echo "<li>Pégala en este archivo (línea 9)</li>";
    echo "</ol>";
    
    echo "<h3>📱 Configuración del Mensaje en Zapier:</h3>";
    echo "<pre>";
    echo "🆕 *Nuevo Mensaje de Contacto*

👤 *Nombre:* {{name}}
📧 *Email:* {{email}}
📱 *Teléfono:* {{phone}}
💬 *Mensaje:*
{{message}}

📅 *Fecha:* {{timestamp}}
🔗 *Fuente:* fosforoweb.com.ar";
    echo "</pre>";
    
} else {
    echo "<div style='background: #d4edda; padding: 15px; border-radius: 5px; margin: 20px 0;'>";
    echo "<h3>✅ Configuración Detectada</h3>";
    echo "<p>Webhook URL configurado: <code>" . substr($webhookUrl, 0, 50) . "...</code></p>";
    echo "</div>";
    
    // Crear servicio de WhatsApp
    $whatsappService = new SimpleWhatsAppService('zapier');
    
    // Configurar webhook
    $reflection = new ReflectionClass($whatsappService);
    $property = $reflection->getProperty('config');
    $property->setAccessible(true);
    $config = $property->getValue($whatsappService);
    $config['url'] = $webhookUrl;
    $property->setValue($whatsappService, $config);
    
    echo "<h3>🧪 Ejecutar Prueba</h3>";
    
    if (isset($_POST['test_whatsapp'])) {
        echo "<div style='background: #f8f9fa; padding: 15px; border-radius: 5px; margin: 20px 0;'>";
        echo "<h4>Enviando mensaje de prueba...</h4>";
        
        $result = $whatsappService->sendTestMessage();
        
        if ($result['success']) {
            echo "<div style='background: #d4edda; padding: 10px; border-radius: 5px; color: #155724;'>";
            echo "✅ <strong>Mensaje enviado correctamente!</strong><br>";
            echo "Método: " . $result['method'] . "<br>";
            echo "Revisa tu WhatsApp en unos segundos.";
            echo "</div>";
        } else {
            echo "<div style='background: #f8d7da; padding: 10px; border-radius: 5px; color: #721c24;'>";
            echo "❌ <strong>Error al enviar mensaje:</strong><br>";
            echo $result['error'];
            echo "</div>";
        }
        echo "</div>";
    }
    
    echo "<form method='POST'>";
    echo "<button type='submit' name='test_whatsapp' style='background: #007bff; color: white; padding: 12px 30px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;'>";
    echo "📱 Enviar Mensaje de Prueba a WhatsApp";
    echo "</button>";
    echo "</form>";
    
    echo "<h3>📋 Datos de Prueba</h3>";
    echo "<p>El mensaje de prueba incluirá:</p>";
    echo "<ul>";
    echo "<li>👤 <strong>Nombre:</strong> Prueba</li>";
    echo "<li>📧 <strong>Email:</strong> test@fosforoweb.com.ar</li>";
    echo "<li>📱 <strong>Teléfono:</strong> +549261123456</li>";
    echo "<li>💬 <strong>Mensaje:</strong> Este es un mensaje de prueba del sistema de contactos.</li>";
    echo "<li>📅 <strong>Fecha:</strong> " . date('d/m/Y H:i:s') . "</li>";
    echo "</ul>";
}

echo "<hr>";
echo "<h3>🔗 Enlaces Útiles</h3>";
echo "<ul>";
echo "<li><a href='https://zapier.com' target='_blank'>Zapier - Crear webhook</a></li>";
echo "<li><a href='https://make.com' target='_blank'>Make.com - Alternativa a Zapier</a></li>";
echo "<li><a href='https://ifttt.com' target='_blank'>IFTTT - Otra alternativa</a></li>";
echo "<li><a href='admin-contactos.php'>Panel de Administración</a></li>";
echo "<li><a href='index.php'>Volver al sitio</a></li>";
echo "</ul>";

echo "<p><em>Archivo de prueba generado el " . date('Y-m-d H:i:s') . "</em></p>";
?>
