# Utiliser l'image de base Nginx officielle
FROM nginx:latest

# Copier les fichiers de configuration Nginx (optionnel, si tu as une conf personnalisée)
#COPY ./nginx/default.conf /etc/nginx/conf.d/default.conf

# Copier ton application dans le répertoire par défaut de Nginx
COPY . /var/www/html

# Changer les permissions du répertoire
RUN chown -R www-data:www-data /var/www/html

# Exposer le port 80 pour le conteneur Nginx
EXPOSE 80
