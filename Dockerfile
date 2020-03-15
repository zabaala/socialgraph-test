FROM php:5.6-alpine

MAINTAINER Mauricio Rodrigues <mmauricio.vsr@gmail.com>

RUN echo "---> Installing Composer" && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer