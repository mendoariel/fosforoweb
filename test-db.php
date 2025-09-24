<?php
// Archivo de prueba de conexión a base de datos
echo "<h1>🔍 Prueba de Conexión a Base de Datos</h1>";

// Configuraciones posibles (vamos a probarlas)
$configs = [
    [
        'host' => 'localhost',
        'user' => 'a0020600',
        'pass' => 'mefaKlzu18',
        'db' => 'a0020600_fosforo'
    ],
    [
        'host' => 'a0020600.ferozo.com',
        'user' => 'a0020600',
        'pass' => 'mefaKlzu18',
        'db' => 'a0020600_fosforo'
    ],
    [
        'host' => 'localhost',
        'user' => 'a0020600',
        'pass' => 'mefaKlzu18',
        'db' => 'a0020600'
    ]
];

echo "<h2>📊 Información del Servidor</h2>";
echo "<p><strong>PHP Version:</strong> " . phpversion() . "</p>";
echo "<p><strong>MySQL Extension:</strong> " . (extension_loaded('mysql') ? "✅ Disponible" : "❌ No disponible") . "</p>";
echo "<p><strong>MySQLi Extension:</strong> " . (extension_loaded('mysqli') ? "✅ Disponible" : "❌ No disponible") . "</p>";
echo "<p><strong>PDO MySQL:</strong> " . (extension_loaded('pdo_mysql') ? "✅ Disponible" : "❌ No disponible") . "</p>";

echo "<h2>🔌 Pruebas de Conexión</h2>";

foreach($configs as $i => $config) {
    echo "<h3>Prueba " . ($i + 1) . ":</h3>";
    echo "<p><strong>Host:</strong> " . $config['host'] . "</p>";
    echo "<p><strong>Usuario:</strong> " . $config['user'] . "</p>";
    echo "<p><strong>Base de datos:</strong> " . $config['db'] . "</p>";
    
    // Probar MySQLi
    if(extension_loaded('mysqli')) {
        $mysqli = new mysqli($config['host'], $config['user'], $config['pass'], $config['db']);
        
        if($mysqli->connect_error) {
            echo "<p style='color: red;'>❌ Error MySQLi: " . $mysqli->connect_error . "</p>";
        } else {
            echo "<p style='color: green;'>✅ Conexión MySQLi exitosa!</p>";
            echo "<p><strong>Versión MySQL:</strong> " . $mysqli->server_info . "</p>";
            $mysqli->close();
        }
    }
    
    // Probar PDO
    if(extension_loaded('pdo_mysql')) {
        try {
            $pdo = new PDO("mysql:host=" . $config['host'] . ";dbname=" . $config['db'], $config['user'], $config['pass']);
            echo "<p style='color: green;'>✅ Conexión PDO exitosa!</p>";
        } catch(PDOException $e) {
            echo "<p style='color: red;'>❌ Error PDO: " . $e->getMessage() . "</p>";
        }
    }
    
    echo "<hr>";
}

echo "<h2>📋 Próximos Pasos</h2>";
echo "<p>1. Accede al cPanel para ver las credenciales exactas</p>";
echo "<p>2. Crea una base de datos si no existe</p>";
echo "<p>3. Configura los permisos de usuario</p>";

echo "<p><em>Prueba generada el " . date('Y-m-d H:i:s') . "</em></p>";
?>
