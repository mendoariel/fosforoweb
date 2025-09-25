# 📱 Guía de Botones de WhatsApp - Fosforo Web

## 🎯 Botones Implementados

### **1. Botón en Hero Section**
- **Ubicación**: Sección principal (arriba de la página)
- **Estilo**: Botón verde con ícono de WhatsApp
- **Texto**: "WhatsApp"

### **2. Botón en Contacto Section**
- **Ubicación**: Sección de información de contacto
- **Estilo**: Botón redondeado con ícono
- **Texto**: "Chatear por WhatsApp"

### **3. Botón Flotante**
- **Ubicación**: Esquina inferior derecha (siempre visible)
- **Estilo**: Botón circular con animación de pulso
- **Tooltip**: "¡Chateá con nosotros!"

## ⚙️ Configuración

### **Número de WhatsApp**
Todos los botones usan el número: **+54 261 559-7977**

### **Mensaje Predeterminado**
```
Hola! Me interesa conocer más sobre sus servicios de desarrollo web
```

### **URL de WhatsApp**
```
https://wa.me/542615597977?text=Hola!%20Me%20interesa%20conocer%20más%20sobre%20sus%20servicios%20de%20desarrollo%20web
```

## 🎨 Personalización

### **Cambiar Número de Teléfono**
1. Edita `index.php`
2. Busca todas las instancias de `542615597977`
3. Reemplaza con tu número (sin + ni espacios)
4. Ejemplo: `542615597977` → `542611234567`

### **Cambiar Mensaje Predeterminado**
1. Edita el texto después de `?text=`
2. URL-encode los espacios con `%20`
3. Ejemplo: `Hola!%20Necesito%20ayuda%20con%20mi%20sitio%20web`

### **Cambiar Colores**
Edita `assets/css/style-modern.css`:
```css
/* Color principal de WhatsApp */
--whatsapp-green: #25d366;
--whatsapp-green-hover: #128c7e;
```

### **Ocultar/Mostrar Botones**
Para ocultar un botón específico, agrega `display: none;` en el CSS:

```css
/* Ocultar botón flotante */
.whatsapp-float {
    display: none;
}

/* Ocultar botón en hero */
.btn-whatsapp {
    display: none;
}

/* Ocultar botón en contacto */
.whatsapp-btn {
    display: none;
}
```

## 📱 Funcionalidades

### **Responsive Design**
- ✅ Botones se adaptan a móviles
- ✅ Tamaños optimizados para touch
- ✅ Tooltips responsivos

### **Animaciones**
- ✅ Pulso en botón flotante
- ✅ Hover effects en todos los botones
- ✅ Animación de entrada
- ✅ Transiciones suaves

### **Accesibilidad**
- ✅ `target="_blank"` para abrir en nueva pestaña
- ✅ `rel="noopener"` por seguridad
- ✅ `title` attributes para tooltips
- ✅ Íconos descriptivos

## 🧪 Pruebas

### **Test Manual**
1. Ve a `https://fosforoweb.com.ar`
2. Haz click en cualquier botón de WhatsApp
3. Verifica que abre WhatsApp Web/App
4. Confirma que el mensaje predeterminado aparece

### **Test en Móvil**
1. Abre el sitio en tu teléfono
2. Haz click en los botones
3. Verifica que abre la app de WhatsApp
4. Confirma que el número y mensaje son correctos

## 🔧 Código de Ejemplo

### **Botón Básico**
```html
<a href="https://wa.me/542615597977?text=Hola!" 
   class="btn btn-whatsapp" 
   target="_blank" 
   rel="noopener">
    <i class="fab fa-whatsapp"></i> WhatsApp
</a>
```

### **Botón Flotante**
```html
<div class="whatsapp-float">
    <a href="https://wa.me/542615597977?text=Hola!" 
       class="whatsapp-float-btn" 
       target="_blank" 
       rel="noopener">
        <i class="fab fa-whatsapp"></i>
    </a>
</div>
```

## 📊 Métricas Sugeridas

### **Google Analytics**
Agrega eventos para trackear clicks:
```javascript
// Trackear clicks en botones de WhatsApp
document.querySelectorAll('.btn-whatsapp, .whatsapp-btn, .whatsapp-float-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        gtag('event', 'whatsapp_click', {
            'event_category': 'engagement',
            'event_label': 'whatsapp_button'
        });
    });
});
```

### **Facebook Pixel**
```javascript
fbq('track', 'Contact', {
    contact_method: 'whatsapp'
});
```

## 🚀 Mejoras Futuras

### **Posibles Mejoras**
- [ ] Botón con horario de atención
- [ ] Mensajes diferentes según la sección
- [ ] Botón con contador de mensajes
- [ ] Integración con CRM
- [ ] Botón con chat widget
- [ ] Mensajes personalizados por página

### **Integraciones**
- [ ] WhatsApp Business API
- [ ] Chatbots automáticos
- [ ] Respuestas automáticas
- [ ] Seguimiento de conversaciones

## 🆘 Solución de Problemas

### **Problema: Botón no abre WhatsApp**
**Solución:**
1. Verificar que el número tenga formato correcto
2. Probar en diferentes navegadores
3. Verificar que WhatsApp esté instalado

### **Problema: Mensaje no aparece**
**Solución:**
1. Verificar URL encoding
2. Probar con mensaje más corto
3. Verificar caracteres especiales

### **Problema: Botón no se ve bien en móvil**
**Solución:**
1. Verificar media queries en CSS
2. Probar en diferentes tamaños de pantalla
3. Ajustar z-index si es necesario

---

## 📞 Soporte

Si necesitas ayuda con la configuración de los botones de WhatsApp, contacta al desarrollador o revisa la documentación oficial de WhatsApp Business API.
