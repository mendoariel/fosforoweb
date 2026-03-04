# 🔄 Guía Rápida: Renovar Certificado SSL

## ✅ Situación Actual

- **Dominio:** `fosforoweb.com.ar`
- **Certificado actual:** ZeroSSL RSA Domain Secure Site CA
- **Estado:** Por Vencer
- **Vencimiento:** 2025-12-23 20:59:59

---

## 🚀 Pasos para Renovar (Desde el Panel de Ferozo)

### Opción 1: Renovar el Certificado Actual (ZeroSSL)

1. **En el panel de SSL/TLS:**
   - Haz clic en el botón **"Instalar nuevo"** (arriba a la derecha)
   - O haz clic en el enlace **"Instalar certificado"** (abajo de la tabla)

2. **Selecciona el tipo de certificado:**
   - Elige **"ZeroSSL"** o **"Let's Encrypt"** (ambos son gratuitos)
   - **Recomendación:** Usa **Let's Encrypt** si está disponible (renovación automática)

3. **Selecciona el dominio:**
   - Marca `fosforoweb.com.ar`
   - Si quieres incluir `www.fosforoweb.com.ar`, marca ambas opciones

4. **Verificación del dominio:**
   - El sistema verificará automáticamente que eres el dueño del dominio
   - Esto puede tomar 1-5 minutos

5. **Instalación:**
   - El certificado se instalará automáticamente
   - Espera 5-10 minutos para que se active

6. **Verificación:**
   - Visita `https://fosforoweb.com.ar`
   - Debe aparecer el candado verde 🔒
   - El estado cambiará de "Por Vencer" a "Activo"

---

## 🔄 Renovación Automática

### Si eliges Let's Encrypt:
- ✅ Se renueva automáticamente cada 90 días
- ✅ No necesitas hacer nada manualmente
- ✅ El panel de Ferozo lo gestiona automáticamente

### Si eliges ZeroSSL:
- ⚠️ Debes renovarlo manualmente antes de que venza
- ⚠️ Te recomiendo configurar un recordatorio 30 días antes del vencimiento

---

## 📅 Recomendación

**Mejor opción:** Cambiar a **Let's Encrypt** porque:
- ✅ Renovación automática
- ✅ 100% gratuito
- ✅ Reconocido por todos los navegadores
- ✅ Sin límites de renovación

**Cómo hacerlo:**
1. Haz clic en el ícono de **papelera** 🗑️ para eliminar el certificado actual
2. Haz clic en **"Instalar nuevo"**
3. Selecciona **"Let's Encrypt"**
4. Selecciona `fosforoweb.com.ar`
5. Confirma la instalación

---

## ✅ Verificación Post-Renovación

Después de renovar, verifica:

1. **Navegador:**
   - Visita `https://fosforoweb.com.ar`
   - Debe aparecer el candado verde 🔒
   - No debe haber advertencias de seguridad

2. **Panel de Ferozo:**
   - El estado debe cambiar a **"Activo"**
   - La fecha de vencimiento debe actualizarse

3. **Redirección HTTPS:**
   - Visita `http://fosforoweb.com.ar` (sin S)
   - Debe redirigir automáticamente a `https://fosforoweb.com.ar`
   - Esto ya está configurado en tu `.htaccess` ✅

4. **Test SSL:**
   - Visita [SSL Labs](https://www.ssllabs.com/ssltest/)
   - Ingresa `fosforoweb.com.ar`
   - Debe obtener una calificación A o A+

---

## 🆘 Problemas Comunes

### "No puedo instalar el certificado"
**Solución:**
- Verifica que el dominio apunte correctamente al servidor
- Asegúrate de que el DNS esté configurado correctamente
- Espera unos minutos y vuelve a intentar

### "El certificado no se activa"
**Solución:**
- Espera 10-15 minutos (puede tardar)
- Limpia la caché del navegador
- Verifica que el dominio esté correctamente configurado

### "Sigue mostrando el certificado viejo"
**Solución:**
- Limpia la caché del navegador (Ctrl+Shift+Delete)
- Prueba en modo incógnito
- Espera unos minutos para que se propague

---

## 📝 Notas Importantes

- ⏰ **Renueva ANTES del 23 de diciembre de 2025** para evitar interrupciones
- 🔄 **Let's Encrypt se renueva automáticamente** cada 90 días
- ✅ **Ya tienes configurada la redirección HTTPS** en `.htaccess`
- 🔒 **El certificado actual funciona** hasta diciembre 2025

---

**¿Necesitas ayuda?** El proceso es muy simple desde el panel de Ferozo. Solo necesitas hacer clic en "Instalar nuevo" y seguir los pasos.

