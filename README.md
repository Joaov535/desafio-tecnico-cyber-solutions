# 🚀 Desafio Técnico — Cyber Solutions

Este projeto é um desafio técnico desenvolvido com o framework Laravel.

## 📦 Pré-requisitos

Antes de começar, verifique se você possui instalado:

-   PHP
-   Composer
-   Node.js e NPM
-   MySQL ou outro banco de dados compatível

## ⚙️ Instalação e Configuração

1. **Clone o repositório**

```bash
git clone https://github.com/Joaov535/desafio-tecnico-cyber-solutions.git
cd desafio-tecnico-cyber-solutions
```

2. **Configure o ambiente**

Renomeie o arquivo `.env copy` para `.env`:

```bash
mv .env\ copy .env
```

Em seguida, atualize as variáveis de ambiente com os dados do seu banco:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
```

3. **Instale as dependências**

```bash
composer install
npm install
```

4. **Configure a chave da aplicação**

```bash
php artisan key:generate
```

5. **Execute as migrações e seeds**

```bash
php artisan migrate --seed
```

6. **Inicie o servidor de desenvolvimento**

```bash
composer run dev
```

## 📚 Outros Projetos Relevantes

-   Projeto com Laravel:

    -   🔗 [Task Manager - Sunhub](https://github.com/Joaov535/task-manager-sunhub)

-   Integrações com APIs:
    -   📦 [Shipping Calculator](https://github.com/Joaov535/shipping-calculator)
    -   📦 [Order Tracker](https://github.com/Joaov535/order-tracker)
