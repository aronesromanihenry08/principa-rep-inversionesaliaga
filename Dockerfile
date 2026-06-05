# === ETAPA 1: Compilar los Assets de JavaScript y CSS ===
FROM node:20-alpine AS assets-builder
WORKDIR /app

# Copiamos los archivos de configuración de Node
COPY package*.json ./

# Instalamos las dependencias base de tu proyecto
RUN yarn install

# AGREGAMOS ESTA LÍNEA para forzar la instalación del paquete que Vite te está reclamando
RUN yarn add laravel-echo pusher-js

# Copiamos el resto del código necesario para compilar
COPY . .

# Compilamos los assets
RUN yarn build


# === ETAPA 2: El servidor de Producción con PHP y Nginx ===
FROM serversideup/php:8.2-fpm-nginx

WORKDIR /var/www/html

# Copiamos todo el código fuente del proyecto al contenedor
COPY --chown=webuser:webuser . .

# Copiamos la carpeta pública compilada en la ETAPA 1
COPY --from=assets-builder --chown=webuser:webuser /app/public /var/www/html/public

ENV AUTORUN_ENABLED=true

# Mantenemos el puerto correcto de ServerSideUp
EXPOSE 8080
