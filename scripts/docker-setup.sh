#!/bin/bash

# Script de configuración Docker para Fosforo Web

echo "🐳 Configurando Docker para Fosforo Web..."

# Crear directorio src si no existe
mkdir -p src

# Copiar archivos al directorio src
cp -r includes src/
cp -r api src/
cp -r admin src/
cp *.php src/
cp *.html src/

# Crear directorio de base de datos
mkdir -p database/init

# Crear script de inicialización de BD
cat > database/init/01-init.sql << 'EOF'
CREATE DATABASE IF NOT EXISTS fosforo_local;
USE fosforo_local;

-- Tabla de usuarios
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de servicios
CREATE TABLE IF NOT EXISTS services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2),
    active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insertar datos de prueba
INSERT INTO users (username, email, password) VALUES 
('admin', 'admin@fosforoweb.com.ar', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

INSERT INTO services (title, description, price) VALUES 
('Diseño Web', 'Diseño profesional de sitios web', 50000.00),
('Marketing Digital', 'Estrategias de marketing online', 30000.00),
('SEO', 'Optimización para motores de búsqueda', 25000.00);
EOF

echo "✅ Configuración completada!"
echo ""
echo "Para iniciar el entorno Docker:"
echo "  docker-compose up -d"
echo ""
echo "Para acceder a:"
echo "  Sitio web: http://localhost:8080"
echo "  phpMyAdmin: http://localhost:8081"
echo ""
echo "Para parar el entorno:"
echo "  docker-compose down"
