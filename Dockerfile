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

# Copia todo el código fuente
COPY --chown=www-data:www-data . .

# Añade vendor desde la etapa Composer
COPY --from=composer --chown=www-data:www-data /app/vendor /var/www/html/vendor

# Añade SOLO public/build desde la etapa Node
COPY --from=node-builder --chown=www-data:www-data /app/public/build /var/www/html/public/build

ENV AUTORUN_ENABLED=true

EXPOSE 8080
