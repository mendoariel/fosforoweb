# Imagen base PHP 8.4.12 con Apache (idéntico al hosting)
FROM php:8.4.12-apache

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    libicu-dev \
    libxml2-dev \
    libxslt-dev \
    libonig-dev \
    libssl-dev \
    libcurl4-openssl-dev \
    libgd-dev \
    unzip \
    git \
    && rm -rf /var/lib/apt/lists/*

# Instalar extensiones PHP (iguales al hosting)
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
    pdo \
    pdo_mysql \
    mysqli \
    curl \
    gd \
    json \
    mbstring \
    openssl \
    bcmath \
    calendar \
    ctype \
    dom \
    exif \
    fileinfo \
    filter \
    ftp \
    gettext \
    hash \
    iconv \
    intl \
    libxml \
    opcache \
    pcre \
    random \
    session \
    soap \
    sockets \
    sodium \
    tokenizer \
    xml \
    xmlreader \
    xmlwriter \
    xsl \
    zip \
    zlib

# Instalar PostgreSQL (opcional)
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo_pgsql pgsql

# Instalar SQLite3
RUN docker-php-ext-install pdo_sqlite sqlite3

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configurar Apache
RUN a2enmod rewrite headers ssl

# Configurar PHP (igual al hosting)
RUN echo "memory_limit = 512M" >> /usr/local/etc/php/conf.d/custom.ini \
    && echo "max_execution_time = 60" >> /usr/local/etc/php/conf.d/custom.ini \
    && echo "upload_max_filesize = 128M" >> /usr/local/etc/php/conf.d/custom.ini \
    && echo "post_max_size = 128M" >> /usr/local/etc/php/conf.d/custom.ini \
    && echo "date.timezone = America/Argentina/Buenos_Aires" >> /usr/local/etc/php/conf.d/custom.ini

# Establecer permisos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Puerto
EXPOSE 80

# Comando por defecto
CMD ["apache2-foreground"]
