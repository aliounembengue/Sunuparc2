############################
# Étape 1 : Builder Composer
############################
FROM composer:2 AS vendor

# Copier uniquement les manifestes Composer pour profiter du cache
WORKDIR /app
COPY app/composer.json app/composer.lock* ./ 
# Installer les dépendances sans dev (pour prod) et sans interaction
RUN composer install --no-dev --no-interaction --prefer-dist --no-progress --no-scripts

#####################################
# Étape 2 : Image finale PHP + Apache
#####################################
FROM php:8.2-apache

# Modules Apache / extensions PHP fréquents
RUN a2enmod rewrite \
 && docker-php-ext-install pdo pdo_mysql

# Dossier de l'app
WORKDIR /var/www/html

# Copier le code applicatif
COPY app/ ./

# Copier le dossier vendor depuis l'étape 1
COPY --from=vendor /app/vendor ./vendor

# (Laravel) droits d'écriture sur storage et cache (adapter si besoin)
RUN chown -R www-data:www-data /var/www/html \
 && find storage -type d -exec chmod 775 {} \; || true \
 && find bootstrap/cache -type d -exec chmod 775 {} \; || true

# (Symfony/Laravel) optionnel : variables d'env de prod
# ENV APP_ENV=production

# Santé HTTP
HEALTHCHECK --interval=30s --timeout=3s \
  CMD wget -qO- http://127.0.0.1/ || exit 1

EXPOSE 80
CMD ["apache2-foreground"]