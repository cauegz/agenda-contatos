# Agenda de Contatos (PHP)

## Requisitos
- PHP 8+
- MySQL
- Servidor local (PHP embutido, XAMPP, WAMP ou similar)

## Instalação
1. Clone o repositório
2. Crie um banco de dados chamado `agenda`
3. Crie a tabela `contatos` no MySQL, conforme o arquivo `db/database.sql`
4. Configure as credenciais em `config/conexao.php`

## Executando
Na raiz do projeto, execute:
`php -S localhost:8000 -t public`