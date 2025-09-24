<?php
// Archivo de análisis de capacidades del hosting
echo "<h1>Análisis de Capacidades - Fosforo Web Hosting</h1>";

echo "<h2>📊 Información del Servidor</h2>";
echo "<p><strong>Servidor:</strong> " . $_SERVER['SERVER_SOFTWARE'] . "</p>";
echo "<p><strong>Versión PHP:</strong> " . phpversion() . "</p>";
echo "<p><strong>Sistema Operativo:</strong> " . php_uname() . "</p>";
echo "<p><strong>Directorio actual:</strong> " . getcwd() . "</p>";

echo "<h2>🔧 Módulos PHP Disponibles</h2>";
$modules = get_loaded_extensions();
sort($modules);
echo "<ul>";
foreach($modules as $module) {
    echo "<li>" . $module . "</li>";
}
echo "</ul>";

echo "<h2>💾 Bases de Datos Disponibles</h2>";
$databases = [];
if(extension_loaded('mysql')) $databases[] = "MySQL";
if(extension_loaded('mysqli')) $databases[] = "MySQLi";
if(extension_loaded('pdo_mysql')) $databases[] = "PDO MySQL";
if(extension_loaded('pgsql')) $databases[] = "PostgreSQL";
if(extension_loaded('sqlite')) $databases[] = "SQLite";
if(extension_loaded('sqlite3')) $databases[] = "SQLite3";

if(!empty($databases)) {
    echo "<ul>";
    foreach($databases as $db) {
        echo "<li>✅ " . $db . "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>❌ No se detectaron extensiones de base de datos</p>";
}

echo "<h2>🌐 Capacidades Web</h2>";
echo "<p><strong>cURL:</strong> " . (extension_loaded('curl') ? "✅ Disponible" : "❌ No disponible") . "</p>";
echo "<p><strong>GD (Imágenes):</strong> " . (extension_loaded('gd') ? "✅ Disponible" : "❌ No disponible") . "</p>";
echo "<p><strong>JSON:</strong> " . (extension_loaded('json') ? "✅ Disponible" : "❌ No disponible") . "</p>";
echo "<p><strong>XML:</strong> " . (extension_loaded('xml') ? "✅ Disponible" : "❌ No disponible") . "</p>";
echo "<p><strong>ZIP:</strong> " . (extension_loaded('zip') ? "✅ Disponible" : "❌ No disponible") . "</p>";
echo "<p><strong>OpenSSL:</strong> " . (extension_loaded('openssl') ? "✅ Disponible" : "❌ No disponible") . "</p>";

echo "<h2>📁 Permisos y Límites</h2>";
echo "<p><strong>Memoria máxima:</strong> " . ini_get('memory_limit') . "</p>";
echo "<p><strong>Tiempo de ejecución:</strong> " . ini_get('max_execution_time') . " segundos</p>";
echo "<p><strong>Tamaño máximo de archivo:</strong> " . ini_get('upload_max_filesize') . "</p>";
echo "<p><strong>Post máximo:</strong> " . ini_get('post_max_size') . "</p>";

echo "<h2>🔒 SSL y Seguridad</h2>";
echo "<p><strong>HTTPS:</strong> " . (isset($_SERVER['HTTPS']) ? "✅ Activo" : "❌ No activo") . "</p>";
echo "<p><strong>Puerto:</strong> " . $_SERVER['SERVER_PORT'] . "</p>";

echo "<h2>📧 Email</h2>";
echo "<p><strong>mail():</strong> " . (function_exists('mail') ? "✅ Disponible" : "❌ No disponible") . "</p>";

echo "<h2>📊 Información del Dominio</h2>";
echo "<p><strong>Host:</strong> " . $_SERVER['HTTP_HOST'] . "</p>";
echo "<p><strong>IP del servidor:</strong> " . $_SERVER['SERVER_ADDR'] . "</p>";

echo "<hr>";
echo "<p><em>Análisis generado el " . date('Y-m-d H:i:s') . "</em></p>";
?>
