# === ETAPA 1: Compilar los Assets de JavaScript y CSS ===
FROM node:20-alpine AS assets-builder
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

# === ETAPA 2: El servidor de Producción con PHP y Nginx ===
FROM serversideup/php:8.2-fpm-nginx
WORKDIR /var/www/html
COPY --chown=webuser:webuser . .
COPY --from=assets-builder --chown=webuser:webuser /app/public /var/www/html/public

ENV AUTORUN_ENABLED=true

# EXPOSE EL PUERTO CORRECTO PARA ESTA IMAGEN
EXPOSE 6000
