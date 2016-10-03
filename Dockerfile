FROM wordpress:latest
# install the PHP extensions we need
RUN apt-get update \
    && apt-get install -y zlib1g-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install zip
ADD ./wordpress/wp-content /var/www/html/wp-content
