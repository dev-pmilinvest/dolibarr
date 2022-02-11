# Laravel Dolibarr package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/pmilinvest/dolibarr.svg?style=flat-square)](https://packagist.org/packages/pmilinvest/dolibarr)
[![Total Downloads](https://img.shields.io/packagist/dt/pmilinvest/dolibarr.svg?style=flat-square)](https://packagist.org/packages/pmilinvest/dolibarr)
![GitHub Actions](https://github.com/pmilinvest/dolibarr/actions/workflows/main.yml/badge.svg)

Facilite l'utilisation des Données Dolibarr dans Laravel

## Installation

Vous pouvez installer le package avec composer:

```bash
composer require pmilinvest/dolibarr
```

## Configuration

```php
#Configuration DOLIBAR API
DOLIBARR_SERVER=https://XXX.XXX.XXX.XXX
DOLIBARR_API_KEY=XXXXXXXXXXXXXXXXXXXXXXX
DOLIBARR_USE_AUTH=NO
DOLIBARR_API_USER=XXXXXXX
DOLIBARR_API_PASSWORD=XXXXXXXX
```




## Usage
Vous pouvez vérifier que votre connection à l'API Dolibarr fonctionne en utilisan la commande artisan :
```php
 php artisan dolibarr:test
```

Utilisez les fleches pour choisir l'option "Voir la configuration"

```php
PMIL Invest Laravel Dolibarr Package
====================================

MENU DES FONCTIONS API Dolibarr
===============================

Choisir la fonction API:
[configuration] Voir la configuration
[quitter      ] QUITTER
> Voir la configuration

+-------------+------------------------------------------+
| Nom         | Valeur                                   |
+-------------+------------------------------------------+
| API Url     | https://XXX.XXX.XXX.XXX/api/index.php    |
| Utilisateur | XXXXXXX                                  |
| Password    | XXXXXXX                                  |
| Token       | XXXXXXXXXXXXXXXXXXXXXXX                  |
+-------------+------------------------------------------+

```

## Credits

-   [PMIL Invest](https://github.com/pmilinvest)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
