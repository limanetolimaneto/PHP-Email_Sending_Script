# Usar PHP 8.1 com servidor embutido
FROM php:8.1-cli

# Instalar extensões e utilitários necessários
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    && rm -rf /var/lib/apt/lists/*

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar código para dentro do container
WORKDIR /app
COPY . /app

# Instalar dependências do Composer (ex: PHPMailer)
RUN composer install --no-dev --optimize-autoloader

# Expor porta que o Render espera
EXPOSE 10000

# Rodar servidor embutido do PHP
#CMD ["php", "-S", "0.0.0.0:10000", "-t", "."]
CMD php -S 0.0.0.0:10000 -t .

