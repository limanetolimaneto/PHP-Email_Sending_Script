# Usar imagem oficial do PHP com Apache
FROM php:8.1-apache

# Instalar dependências do Composer
RUN apt-get update && apt-get install -y unzip git && rm -rf /var/lib/apt/lists/*

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar projeto para a pasta padrão do Apache
COPY . /var/www/html/

# Instalar dependências do PHP via Composer
WORKDIR /var/www/html
RUN composer install --no-dev --optimize-autoloader

# Habilitar rewrite (opcional, se usar URLs amigáveis)
RUN a2enmod rewrite

# Expor porta que o Render espera
EXPOSE 10000

# O Apache já é iniciado automaticamente na imagem, então não precisa de CMD
