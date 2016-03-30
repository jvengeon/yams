FROM php:7-apache

COPY virtualhost.conf /etc/apache2/sites-enabled/000-default.conf

EXPOSE 80
CMD ["apache2ctl", "-D", "FOREGROUND"]