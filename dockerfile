FROM wordpress:php7.1-apache
COPY --chown=www-data ["wp-content","/var/www/html/wp-content"]
COPY --chown=www-data ["wp-config.php","/var/www/html/."]