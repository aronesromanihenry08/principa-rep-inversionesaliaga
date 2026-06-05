# Usamos una imagen optimizada que ya tiene PHP 8.2, Apache y todas las extensiones instaladas
FROM serversideup/php:8.2-fpm-nginx

# Cambiamos el directorio de trabajo predeterminado
WORKDIR /var/www/html

# Copiamos el proyecto al contenedor
COPY --chown=webuser:webuser . .

# El servidor web de esta imagen ya apunta a la carpeta /public de Laravel por defecto
# e instala Composer automáticamente de ser necesario en producción.
ENV AUTORUN_ENABLED=true
