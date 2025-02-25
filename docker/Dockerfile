FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    vim \
    unzip \
    libicu-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libxml2-dev \
    libwebp-dev \
    libcurl4-openssl-dev

RUN docker-php-ext-install curl

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-configure intl \
    && docker-php-ext-install intl

RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install gd

RUN docker-php-ext-install simplexml

# add usuário específico para evitar problemas de permissões
RUN adduser --disabled-password --gecos '' docker_user

RUN chown -R docker_user:docker_user /var/www

# permissões para o diretório de escrita
RUN mkdir -p /var/www/writable/database && \
    chown -R docker_user:docker_user /var/www/writable && \
    chmod -R 775 /var/www/writable

WORKDIR /var/www

# usa o usuário criado
USER docker_user

CMD ["php-fpm"]
