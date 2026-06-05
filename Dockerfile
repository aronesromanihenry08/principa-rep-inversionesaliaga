# === ETAPA 1: Compilar los Assets de JavaScript y CSS ===
FROM node:20-alpine AS assets-builder
WORKDIR /app

# Copiamos los archivos de configuración de Node
COPY package*.json ./

# Instalamos las dependencias base de tu proyecto
RUN yarn install

# Forzamos la instalación de los paquetes faltantes para Vite
RUN yarn add laravel-echo pusher-js

# Copiamos el resto del código necesario para compilar
COPY . .

# Compilamos los assets
RUN yarn build


# === ETAPA 2: El servidor de Producción con PHP y Nginx ===
FROM serversideup/php:8.2-fpm-nginx

# Nos aseguramos de estar en el directorio correcto
WORKDIR /var/www/html

# Copiamos todo el código fuente y le damos la propiedad al usuario www-data
COPY --chown=www-data:www-data . .

# Copiamos la carpeta pública compilada de la ETAPA 1
COPY --from=assets-builder --chown=www-data:www-data /app/public /var/www/html/public

ENV AUTORUN_ENABLED=true

# Mantenemos el puerto correcto de ServerSideUp
EXPOSE 8080
