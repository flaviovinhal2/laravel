# Laravel Minimal Project (Activity)

Estrutura mínima com controllers, models, migrations, views e rotas conforme solicitado.

## Como usar no Codespaces

1. Abra o Codespace e clone este repositório.
2. Execute:
   - `composer install`
   - copie `.env.example` para `.env` e ajuste as variáveis de conexão MySQL (DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD)
   - `php artisan key:generate`
   - `php artisan migrate`
   - `php artisan serve --host=0.0.0.0 --port=8000`

3. Acesse:
   - `http://localhost:8000/produtos`
   - `http://localhost:8000/categorias`

## Observações

- Este package não contém a pasta `vendor`. Rode `composer install` no Codespace.
- Versão alvo: Laravel 12.x (definida no composer.json)
