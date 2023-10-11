# Sử dụng hình ảnh chứa PHP và Apache
FROM php:7.4-apache

RUN docker-php-ext-install sockets

# Sao chép tất cả tệp trong thư mục dự án của bạn vào /var/www/html trong hình ảnh
COPY . /var/www/html

# Mở cổng 80 để Apache lắng nghe
EXPOSE 80 12345

RUN chmod 777 /var/www/html/*

# Khởi động Apache
CMD ["apache2-foreground"]
