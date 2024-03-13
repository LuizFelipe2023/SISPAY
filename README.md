# Projeto SISPAY

## Descrição
Este projeto é uma aplicação web para gerenciamento de pagamentos de funcionários.

## Requisitos
- PHP >= 7.0
- Composer
- MySQL
- Node.js
- npm

## Instalação

1. Clone o repositório:

    ```
    git clone https://github.com/seu-usuario/projeto-xyz.git
    ```

2. Instale as dependências do PHP com o Composer:

    ```
    composer install
    ```

3. Copie o arquivo `.env.example` para `.env` e configure as variáveis de ambiente, como conexão com o banco de dados.

4. Gere a chave de aplicativo:

    ```
    php artisan key:generate
    ```

5. Execute as migrações do banco de dados para criar as tabelas:

    ```
    php artisan migrate
    ```

6. Inicie o servidor local:

    ```
    php artisan serve
    ```

7. Acesse a aplicação no navegador em `http://localhost:8000`.

## Uso
- Acesse a aplicação no navegador e faça login, registro, reset de password(ainda em testes).
- Na página inicial, você pode cadastrar novos funcionários e pagamentos, bem como visualizar, editar e excluir funcionários e pagamentos existentes.
- Sistema Gerador de PDF

## Licença
Este projeto está licenciado sob a [MIT License](LICENSE).
