<?php
require_once 'includes/config.php';

echo "<h1>🔍 Test de Conexión a Base de Datos</h1>";

echo "<h2>📊 Información del Servidor</h2>";
echo "<p><strong>PHP Version:</strong> " . phpversion() . "</p>";
echo "<p><strong>MySQL Extension:</strong> " . (extension_loaded('mysql') ? "✅ Disponible" : "❌ No disponible") . "</p>";
echo "<p><strong>MySQLi Extension:</strong> " . (extension_loaded('mysqli') ? "✅ Disponible" : "❌ No disponible") . "</p>";
echo "<p><strong>PDO MySQL:</strong> " . (extension_loaded('pdo_mysql') ? "✅ Disponible" : "❌ No disponible") . "</p>";

echo "<h2>🔌 Configuración Actual</h2>";
echo "<p><strong>Host:</strong> " . DB_HOST . "</p>";
echo "<p><strong>Usuario:</strong> " . DB_USER . "</p>";
echo "<p><strong>Base de datos:</strong> " . DB_NAME . "</p>";
echo "<p><strong>URL del sitio:</strong> " . SITE_URL . "</p>";

echo "<h2>🧪 Prueba de Conexión</h2>";

try {
    $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p style='color: green;'>✅ Conexión a la base de datos exitosa!</p>";

    // Mostrar servicios de la base de datos
    $stmt = $conn->prepare("SELECT * FROM services LIMIT 5");
    $stmt->execute();
    $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if ($services) {
        echo "<h3>📋 Servicios en la base de datos:</h3>";
        echo "<table border='1' style='border-collapse: collapse; width: 100%; margin: 20px 0;'>";
        echo "<tr style='background: #f0f0f0;'><th>ID</th><th>Título</th><th>Descripción</th><th>Precio</th><th>Activo</th></tr>";
        foreach ($services as $service) {
            echo "<tr>";
            echo "<td>" . $service['id'] . "</td>";
            echo "<td>" . htmlspecialchars($service['title']) . "</td>";
            echo "<td>" . htmlspecialchars($service['description']) . "</td>";
            echo "<td>$" . number_format($service['price'], 0, ',', '.') . "</td>";
            echo "<td>" . ($service['active'] ? "✅" : "❌") . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='color: orange;'>⚠️ No hay servicios en la base de datos.</p>";
    }

    // Verificar si existe la tabla de contactos
    $stmt = $conn->prepare("SHOW TABLES LIKE 'contacts'");
    $stmt->execute();
    $contactsTable = $stmt->fetch();
    
    if ($contactsTable) {
        echo "<p style='color: green;'>✅ Tabla 'contacts' existe.</p>";
        
        $stmt = $conn->prepare("SELECT COUNT(*) as total FROM contacts");
        $stmt->execute();
        $contactCount = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "<p><strong>Total de contactos:</strong> " . $contactCount['total'] . "</p>";
    } else {
        echo "<p style='color: orange;'>⚠️ Tabla 'contacts' no existe aún.</p>";
    }

} catch(PDOException $e) {
    echo "<p style='color: red;'>❌ Error de conexión o base de datos: " . $e->getMessage() . "</p>";
}

$conn = null; // Cerrar conexión

echo "<h2>📋 Información del Entorno</h2>";
echo "<p><strong>Entorno:</strong> " . (defined('DEBUG_MODE') && DEBUG_MODE ? "Desarrollo (Docker)" : "Producción") . "</p>";
echo "<p><strong>Timestamp:</strong> " . date('Y-m-d H:i:s') . "</p>";
?>