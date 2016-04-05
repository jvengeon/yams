FROM php:7-apache

COPY virtualhost.conf /etc/apache2/sites-enabled/000-default.conf
ADD bootstrap.sh /root/bootstrap.sh
EXPOSE 8080
CMD [ "sh", "/root/bootstrap.sh" ]