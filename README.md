# Laravel Dolibarr package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/pmilinvest/dolibarr.svg?style=flat-square)](https://packagist.org/packages/pmilinvest/dolibarr)
[![Total Downloads](https://img.shields.io/packagist/dt/pmilinvest/dolibarr.svg?style=flat-square)](https://packagist.org/packages/pmilinvest/dolibarr)
![GitHub Actions](https://github.com/pmilinvest/dolibarr/actions/workflows/main.yml/badge.svg)

Facilite l'utilisation des Données Dolibarr dans Laravel

## Installation

Vous pouvez installer le package avec composer:

```bash
composer require pmilinvest/dolibarr
php artisan vendor:publish --tag=config
```

Renseignez la configuration minimale pour accéder à l'API Dolibarr dans votre fichier .env situé à la racine de votre application Laravel
```php
#Configuration DOLIBAR API
DOLIBARR_SERVER=https://XXX.XXX.XXX.XXX
DOLIBARR_API_KEY=XXXXXXXXXXXXXXXXXXXXXXX
DOLIBARR_USE_AUTH=NO
DOLIBARR_API_USER=XXXXXXX
DOLIBARR_API_PASSWORD=XXXXXXXX
```




## Utilisation
Vous pouvez déjà commencez par vérifier que votre connection à l'API Dolibarr fonctionne correctement en utilisan la commande artisan :
```php
 php artisan dolibarr:test
```
Utilisez les flèches du clavier pour choisir l'option "Voir la configuration"


Si le token esr renseigné alors tout va bien !
Il ne reste plus qu'a s'inspirer de code pour avancer.


```
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

-   [PMIL Invest](https://pmil.fr)
-   dev2.info@pmilinvest.fr for his future prolific help ; Welcome gui !

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
