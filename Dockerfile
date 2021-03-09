FROM php:8.0.3-cli

RUN apt-get update
RUN apt-get install -y libzip-dev git zip \
  && docker-php-ext-install zip
RUN curl -sS https://getcomposer.org/installer | php \
        && mv composer.phar /usr/local/bin/ \
        && ln -s /usr/local/bin/composer.phar /usr/local/bin/composer
COPY . /wordy
WORKDIR /wordy
ENV PATH="~/.composer/vendor/bin:./vendor/bin:${PATH}"