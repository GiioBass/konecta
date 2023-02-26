
## Consultas

- Realizar una consulta que permita conocer cuál es el producto más vendido.

 SELECT reference, SUM(quantity) AS total_sales
FROM sells
GROUP BY reference
ORDER BY total_sales DESC
LIMIT 1;

- Realizar una consulta que permita conocer cuál es el producto que más stock tiene.

SELECT name, stock
FROM products
ORDER BY stock DESC
LIMIT 1;


# Prueba técnica 

Proyecto realizado para prueba técnica.




## Proyect 

- PHP 8.0.2
- Laravel 9.19
- Vue 3 Composition API
- Axios 1.3.3
- Vue router 4.1.6
- Vite 4.0.0

## Installation

Clone proyect

```bash
  git clone https://github.com/GiioBass/konecta.git
  cd konecta
```
Create Data Base.

Create file .env and configure DB connection

```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=konecta
    DB_USERNAME=
    DB_PASSWORD=
```
Install composer

```bash
  composer install
```
Install npm
(optional)
```bash
  npm install
```

Run migrations

```bash
  php artisan migrate
```
Build project for production or run project in environment develop

Production
(optional)
```bash
  npm run build
```
develop
(optional)
```bash
  npm run dev
```

Run server web with artisan

```bash
  php artisan serve
```


## Authors

- [@Giiobass](https://www.github.com/Giiobass)


[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)
[![GPLv3 License](https://img.shields.io/badge/License-GPL%20v3-yellow.svg)](https://opensource.org/licenses/)
[![AGPL License](https://img.shields.io/badge/license-AGPL-blue.svg)](http://www.gnu.org/licenses/agpl-3.0)

