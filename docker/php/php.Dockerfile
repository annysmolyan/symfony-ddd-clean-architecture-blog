FROM php:8.1-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
  libzip-dev \
  libonig-dev \
  cron \
  libfreetype6-dev \
  libicu-dev \
  libjpeg62-turbo-dev \
  libmcrypt-dev \
  libxslt1-dev \
  zip \
  libpng-dev \
  libxml2-dev \
  libxslt-dev \
  curl \
  vim \
  wget \
  git \
  procps \
  wget

RUN docker-php-ext-install \
  pdo \
  pdo_mysql \
  mysqli \
  sockets \
  bcmath \
  gd \
  intl \
  mbstring \
  opcache \
  pdo_mysql \
  soap \
  xsl \
  zip

RUN set -x \
    && pecl install -f xdebug-3.0.1 \
    && docker-php-ext-enable xdebug

RUN docker-php-ext-install -j$(nproc) iconv

RUN docker-php-ext-configure gd --with-jpeg=/usr/include/ --with-freetype=/usr/include/

RUN docker-php-ext-install -j$(nproc) gd

# Install Composer
RUN curl -sS https://getcomposer.org/installer | \
  php -- --install-dir=/usr/local/bin --filename=composer

ENV PHP_MEMORY_LIMIT 2G
ENV PHP_MAX_EXECUTION_TIME=300
ENV PHP_POST_MAX_SIZE=500M
ENV PHP_UPLOAD_MAX_FILESIZE=1024M

#ARG user_id=1001
#RUN usermod -u $user_id www-data
#RUN groupmod -g $user_id www-data

#RUN chown -R www-data:www-data /var/www
RUN chmod -R g+rwX /var/www
RUN chmod -R g+s /var/www

# Set working directory
WORKDIR /var/www/html

#Install symfony CLI
RUN curl -1sLf https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh | bash
RUN apt-get install symfony-cli

# Expose port 9000 and start php-fpm server
EXPOSE 9000

CMD ["php-fpm"]
