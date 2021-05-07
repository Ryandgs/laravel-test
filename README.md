# VipCommerce Backend

## Requisitos

* / Git
* PHP > 7
* Composer
* My
sql
<br />

## Configurando ambiente

Duplique e renomeie o arquivo .env.example como .env e adicione as configurações do seu ambiente, incluindo as informações do banc
o de dados.
<br />

## Instalando dependências

Com o composer ja instalado, abra o terminal e digite o seguinte comando:
```bash
composer install
```

<br />

## Rodando migrations e seeds

Com o ambiente de banco de dados ja configurado, vamos rodar os seguintes comandos:
```bash
php artisan migrate:fresh
php artisan db:seed
```

<br />

## Rodando a API

Para rodar a API basta digitar o seguinte comando no terminal:
```bash
php artisan serve
```

<br />

## Rodando testes

Para rodar os testes basta inserir o seguinte comando: 
```bash
vendor/bin/phpunit
```

<br />

## Rotas
Algumas preconfigurações de rotas estão disponiveis no arquivo do postman: VipCommerce_Backend.postman_collection.json
