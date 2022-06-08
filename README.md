# TallUI Yeah Alf

[![Latest Version on Packagist](https://img.shields.io/packagist/v/kimspeer/tryalf.svg?style=flat-square)](https://packagist.org/packages/kimspeer/tryalf)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/kimspeer/tryalf/run-tests?label=tests)](https://github.com/kimspeer/tryalf/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/kimspeer/tryalf/Check%20&%20fix%20styling?label=code%20style)](https://github.com/kimspeer/tryalf/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/kimspeer/tryalf.svg?style=flat-square)](https://packagist.org/packages/kimspeer/tryalf)


This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require kimspeer/tryalf
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="tryalf-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="tryalf-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="tryalf-views"
```

## Usage

```php
$tryAlf = new KimSpeer\TryAlf();
echo $tryAlf->echoPhrase('Hello, KimSpeer!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

This package is based on Package TryAlf Laravel from [Spatie](https://spatie.be/products). If you are a Laravel developer, their services, products and trainings are for you. Otherwise they love post cards.

- [KimSpeer](https://github.com/KimSpeer)
- [TALLUI Devs](https://github.com/orgs/usetall/people)
- [Freek Van der Herten](https://github.com/freekmurze)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
