# ========== ETAPA 1: Composer (dependencias PHP) ==========
FROM composer:2.8 AS composer
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --no-scripts --no-progress --optimize-autoloader

# ========== ETAPA 2: Node (compilar assets con Vite) ==========
FROM node:20-alpine AS node-builder
WORKDIR /app
COPY package*.json ./
RUN npm ci --no-audit --no-fund 2>/dev/null || npm install --no-audit --no-fund
COPY . .
RUN npm run build

# ========== ETAPA 3: Imagen final (PHP + Nginx) ==========
FROM serversideup/php:8.3-fpm-nginx AS production

WORKDIR /var/www/html

# Copia todo el código fuente original
COPY --chown=www-data:www-data . .

# Añade vendor desde la etapa Composer
COPY --from=composer --chown=www-data:www-data /app/vendor /var/www/html/vendor

# Añade TODO el contenido de public compilado por Node
COPY --from=node-builder --chown=www-data:www-data /app/public /var/www/html/public

# 1. Crear carpetas vitales por si GitHub las ignoró (.gitignore)
RUN mkdir -p storage/app/public storage/framework/cache storage/framework/sessions storage/framework/views storage/logs

# 2. Dar permisos absolutos para que Laravel no tire Error 500
RUN chmod -R 775 storage bootstrap/cache && chown -R www-data:www-data storage bootstrap/cache

# 3. Crear el link (SIN usar config:cache para que lea las variables en vivo)
RUN php artisan storage:link --force

ENV AUTORUN_ENABLED=true
ENV DEBUG FALSE
ENV mialmacenamientoinversionesaliaga my-gcs-bucket
EXPOSE 8080
