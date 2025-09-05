# Usar PHP CLI
FROM php:8.1-cli

# Instalar dependências
RUN apt-get update && apt-get install -y unzip git && rm -rf /var/lib/apt/lists/*

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar o projeto
WORKDIR /app
COPY . /app

# Instalar dependências via Composer
RUN composer install --no-dev --optimize-autoloader

# Expor porta que o Render espera
EXPOSE 10000

# Start do PHP com shell (formato que Render reconhece)
ENTRYPOINT ["sh", "-c"]
CMD ["php -S 0.0.0.0:10000 -t ."]
