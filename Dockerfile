FROM php:8.1-apache

RUN docker-php-ext-install mysqli

# 將網站原始碼掛到 Apache 的網站目錄
COPY ./src/ /var/www/html/
