# === ETAPA 2: El servidor de Producción con PHP y Nginx ===
FROM serversideup/php:8.2-fpm-nginx

# Nos aseguramos de estar en el directorio correcto
WORKDIR /var/www/html

# Copiamos todo el código fuente y le damos la propiedad a www-data
COPY --chown=www-data:www-data . .

# Copiamos la carpeta pública compilada de la ETAPA 1
COPY --from=assets-builder --chown=www-data:www-data /app/public /var/www/html/public

ENV AUTORUN_ENABLED=true

EXPOSE 8080
