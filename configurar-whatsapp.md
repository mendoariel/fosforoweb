# 📱 Configurar Notificaciones por WhatsApp

## 🚀 Opciones Disponibles

### **Opción 1: Zapier (Más Fácil - Recomendado)**

#### Paso 1: Crear cuenta en Zapier
1. Ve a [zapier.com](https://zapier.com)
2. Crea una cuenta gratuita
3. Verifica tu email

#### Paso 2: Crear un Zap
1. Haz click en "Create Zap"
2. **Trigger (Cuando):** Webhooks by Zapier → Catch Hook
3. **Action (Entonces):** WhatsApp → Send Message
4. Copia la URL del webhook

#### Paso 3: Configurar WhatsApp
1. Conecta tu WhatsApp Business (o personal)
2. Selecciona el número de destino
3. Configura el mensaje:
```
🆕 *Nuevo Mensaje de Contacto*

👤 *Nombre:* {{name}}
📧 *Email:* {{email}}
📱 *Teléfono:* {{phone}}
💬 *Mensaje:*
{{message}}

📅 *Fecha:* {{timestamp}}
🔗 *Fuente:* fosforoweb.com.ar
```

#### Paso 4: Configurar en tu sitio
1. Edita `webhook-simple.php`
2. Cambia la URL del webhook
3. ¡Listo!

---

### **Opción 2: Make.com (Ex-Zapier)**

#### Paso 1: Crear cuenta
1. Ve a [make.com](https://make.com)
2. Crea cuenta gratuita
3. Verifica email

#### Paso 2: Crear Scenario
1. "Create a new scenario"
2. **Trigger:** Webhooks → Custom webhook
3. **Action:** WhatsApp → Send a message
4. Copia la URL del webhook

#### Paso 3: Configurar
- Similar a Zapier pero con interfaz diferente

---

### **Opción 3: IFTTT (If This Then That)**

#### Paso 1: Crear cuenta
1. Ve a [ifttt.com](https://ifttt.com)
2. Crea cuenta
3. Verifica email

#### Paso 2: Crear Applet
1. "Create" → "If This Then That"
2. **If This:** Webhooks → Receive a web request
3. **Then That:** WhatsApp → Send message
4. Copia la URL del webhook

---

### **Opción 4: WhatsApp Business API (Oficial)**

#### Requisitos:
- WhatsApp Business Account
- Número de teléfono verificado
- Proceso de aprobación de Meta

#### Proceso:
1. Registrarse en [business.whatsapp.com](https://business.whatsapp.com)
2. Crear aplicación
3. Obtener Access Token
4. Configurar webhook

---

## ⚙️ Configuración en tu Sitio

### Paso 1: Editar archivo
Edita `webhook-simple.php` y cambia esta línea:
```php
$this->webhookUrl = 'TU_WEBHOOK_URL_AQUI';
```

Por tu URL real:
```php
$this->webhookUrl = 'https://hooks.zapier.com/hooks/catch/1234567890/abcdef/';
```

### Paso 2: Probar
1. Ve a tu sitio web
2. Envía un mensaje de prueba
3. Revisa tu WhatsApp

### Paso 3: Verificar
- ✅ Mensaje llega a WhatsApp
- ✅ Formato correcto
- ✅ Todos los datos incluidos

---

## 🧪 Pruebas

### Test Manual
```php
// Crear archivo test-whatsapp.php
<?php
require_once 'whatsapp-simple.php';

$whatsapp = new SimpleWhatsAppService('zapier');
$result = $whatsapp->sendTestMessage();

if ($result['success']) {
    echo "✅ WhatsApp funcionando correctamente";
} else {
    echo "❌ Error: " . $result['error'];
}
?>
```

### Test desde Formulario
1. Completa el formulario de contacto
2. Envía mensaje
3. Revisa WhatsApp en 30 segundos

---

## 📊 Ventajas de cada Opción

| Servicio | Facilidad | Costo | Límites | Calidad |
|----------|-----------|-------|---------|---------|
| Zapier | ⭐⭐⭐⭐⭐ | Gratis (100 zaps) | 100/mes | ⭐⭐⭐⭐ |
| Make.com | ⭐⭐⭐⭐ | Gratis (1000 ops) | 1000/mes | ⭐⭐⭐⭐ |
| IFTTT | ⭐⭐⭐ | Gratis (3 applets) | 3 applets | ⭐⭐⭐ |
| WhatsApp API | ⭐⭐ | $0.005/mensaje | Sin límite | ⭐⭐⭐⭐⭐ |

---

## 🆘 Solución de Problemas

### Problema: No llegan mensajes
**Solución:**
1. Verificar URL del webhook
2. Revisar logs del servidor
3. Probar webhook manualmente

### Problema: Formato incorrecto
**Solución:**
1. Revisar configuración del mensaje
2. Verificar variables disponibles
3. Ajustar formato

### Problema: Límites alcanzados
**Solución:**
1. Actualizar plan del servicio
2. Cambiar a servicio con más límites
3. Implementar filtros

---

## 💡 Recomendación

**Para empezar:** Usa **Zapier** porque es:
- ✅ Gratis hasta 100 mensajes/mes
- ✅ Fácil de configurar
- ✅ Confiable
- ✅ Buena documentación

**Para producción:** Considera **WhatsApp Business API** porque es:
- ✅ Oficial
- ✅ Sin límites
- ✅ Mejor deliverability
- ✅ Más profesional
