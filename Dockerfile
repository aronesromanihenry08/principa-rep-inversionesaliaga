# === ETAPA 1: Compilar los Assets de JavaScript y CSS ===
FROM node:20-alpine AS assets-builder
WORKDIR /app

# Copiamos los archivos de configuración de Node
COPY package*.json ./

# Forzamos la instalación de todas las dependencias (incluyendo devDependencies como Vite)
RUN npm install --include=dev

# Copiamos el resto del código necesario para compilar
COPY . .

# Ahora sí encontrará Vite para compilar
RUN npm run build


# === ETAPA 2: El servidor de Producción con PHP y Nginx ===
FROM serversideup/php:8.2-fpm-nginx

WORKDIR /var/www/html

# Copiamos todo el código fuente del proyecto al contenedor
COPY --chown=webuser:webuser . .

# Copiamos la carpeta pública compilada en la ETAPA 1
COPY --from=assets-builder --chown=webuser:webuser /app/public /var/www/html/public

ENV AUTORUN_ENABLED=true

# Exponemos el puerto interno del contenedor
EXPOSE 6000
