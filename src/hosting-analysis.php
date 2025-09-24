<?php
// Análisis completo del hosting para Docker
echo "<h1>🔍 Análisis del Hosting para Docker</h1>";

echo "<h2>📊 Información del Sistema</h2>";
echo "<p><strong>PHP Version:</strong> " . phpversion() . "</p>";
echo "<p><strong>Server Software:</strong> " . $_SERVER['SERVER_SOFTWARE'] . "</p>";
echo "<p><strong>Operating System:</strong> " . php_uname('s') . " " . php_uname('r') . "</p>";
echo "<p><strong>Architecture:</strong> " . php_uname('m') . "</p>";

echo "<h2>🐘 PHP Configuration</h2>";
echo "<p><strong>PHP SAPI:</strong> " . php_sapi_name() . "</p>";
echo "<p><strong>Memory Limit:</strong> " . ini_get('memory_limit') . "</p>";
echo "<p><strong>Max Execution Time:</strong> " . ini_get('max_execution_time') . "</p>";
echo "<p><strong>Upload Max Filesize:</strong> " . ini_get('upload_max_filesize') . "</p>";
echo "<p><strong>Post Max Size:</strong> " . ini_get('post_max_size') . "</p>";

echo "<h2>📦 PHP Extensions</h2>";
$extensions = get_loaded_extensions();
sort($extensions);
echo "<div style='columns: 3; column-gap: 20px;'>";
foreach($extensions as $ext) {
    echo "<div>• " . $ext . "</div>";
}
echo "</div>";

echo "<h2>🗄️ Database Extensions</h2>";
$db_extensions = [];
if(extension_loaded('mysql')) $db_extensions[] = "mysql";
if(extension_loaded('mysqli')) $db_extensions[] = "mysqli";
if(extension_loaded('pdo_mysql')) $db_extensions[] = "pdo_mysql";
if(extension_loaded('pdo_pgsql')) $db_extensions[] = "pdo_pgsql";
if(extension_loaded('pdo_sqlite')) $db_extensions[] = "pdo_sqlite";
if(extension_loaded('sqlite')) $db_extensions[] = "sqlite";
if(extension_loaded('sqlite3')) $db_extensions[] = "sqlite3";

foreach($db_extensions as $db_ext) {
    echo "<p>✅ " . $db_ext . "</p>";
}

echo "<h2>🌐 Web Server Info</h2>";
echo "<p><strong>Document Root:</strong> " . $_SERVER['DOCUMENT_ROOT'] . "</p>";
echo "<p><strong>Server Admin:</strong> " . $_SERVER['SERVER_ADMIN'] . "</p>";
echo "<p><strong>Server Port:</strong> " . $_SERVER['SERVER_PORT'] . "</p>";

echo "<h2>🔧 Docker Configuration Recommendations</h2>";
echo "<h3>PHP Version for Docker:</h3>";
$php_version = phpversion();
echo "<p><code>FROM php:" . $php_version . "-apache</code></p>";

echo "<h3>Required PHP Extensions:</h3>";
$required_extensions = ['pdo', 'pdo_mysql', 'mysqli', 'curl', 'gd', 'json', 'mbstring', 'openssl'];
echo "<p><code>RUN docker-php-ext-install " . implode(' ', $required_extensions) . "</code></p>";

echo "<h3>Apache Modules:</h3>";
if(function_exists('apache_get_modules')) {
    $modules = apache_get_modules();
    echo "<p>Available modules: " . implode(', ', $modules) . "</p>";
}

echo "<h2>📋 Environment Variables for Docker</h2>";
echo "<div style='background: #f5f5f5; padding: 10px; border-radius: 5px;'>";
echo "<pre>";
echo "DB_HOST=db\n";
echo "DB_PORT=3306\n";
echo "DB_NAME=fosforo_local\n";
echo "DB_USER=fosforo\n";
echo "DB_PASS=fosforo123\n";
echo "PHP_MEMORY_LIMIT=" . ini_get('memory_limit') . "\n";
echo "PHP_MAX_EXECUTION_TIME=" . ini_get('max_execution_time') . "\n";
echo "PHP_UPLOAD_MAX_FILESIZE=" . ini_get('upload_max_filesize') . "\n";
echo "</pre>";
echo "</div>";

echo "<h2>🐳 Docker Compose Template</h2>";
echo "<div style='background: #f5f5f5; padding: 10px; border-radius: 5px;'>";
echo "<pre>";
echo "version: '3.8'\n\n";
echo "services:\n";
echo "  web:\n";
echo "    image: php:" . $php_version . "-apache\n";
echo "    ports:\n";
echo "      - \"8080:80\"\n";
echo "    volumes:\n";
echo "      - ./src:/var/www/html\n";
echo "    environment:\n";
echo "      - PHP_MEMORY_LIMIT=" . ini_get('memory_limit') . "\n";
echo "      - PHP_MAX_EXECUTION_TIME=" . ini_get('max_execution_time') . "\n";
echo "    depends_on:\n";
echo "      - db\n\n";
echo "  db:\n";
echo "    image: mysql:8.0\n";
echo "    environment:\n";
echo "      MYSQL_ROOT_PASSWORD: root\n";
echo "      MYSQL_DATABASE: fosforo_local\n";
echo "    ports:\n";
echo "      - \"3306:3306\"\n";
echo "</pre>";
echo "</div>";

echo "<p><em>Análisis generado el " . date('Y-m-d H:i:s') . "</em></p>";
?>
