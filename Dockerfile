FROM php:8.0-apache
WORKDIR /var/www/html
EXPOSE 80

# ADD LIBRARIES FROM COMPOSER TO USE GETENV()
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
COPY composer.json composer.json
COPY composer.lock composer.lock
RUN composer install --no-dev

# COPY NECESSARY FILES
COPY .htaccess .htaccess
COPY config.php config.php
COPY index.php index.php
COPY application application

# CONFIGURE APACHE
RUN echo "<VirtualHost *:80> \
          ServerAdmin eshamov030316@gmail.com \
          DocumentRoot /var/www/html/ \
          DirectoryIndex index.php \
          ErrorLog \${APACHE_LOG_DIR}/error.log \
          CustomLog \${APACHE_LOG_DIR}/access.log combined \
          </VirtualHost>" > /etc/apache2/sites-available/my-site.conf
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf && \
    a2dissite 000-default &&  \
    a2enmod rewrite && \
    a2ensite my-site && \
    service apache2 restart

