[![Latest Stable Version](https://poser.pugx.org/bentools/gmaps-api-sign-url/v/stable)](https://packagist.org/packages/bentools/gmaps-api-sign-url)
[![License](https://poser.pugx.org/bentools/gmaps-api-sign-url/license)](https://packagist.org/packages/bentools/gmaps-api-sign-url)
[![Build Status](https://img.shields.io/travis/bpolaszek/gmaps-api-sign-url/master.svg?style=flat-square)](https://travis-ci.org/bpolaszek/gmaps-api-sign-url)
[![Coverage Status](https://coveralls.io/repos/github/bpolaszek/gmaps-api-sign-url/badge.svg?branch=master)](https://coveralls.io/github/bpolaszek/gmaps-api-sign-url?branch=master)
[![Quality Score](https://img.shields.io/scrutinizer/g/bpolaszek/gmaps-api-sign-url.svg?style=flat-square)](https://scrutinizer-ci.com/g/bpolaszek/gmaps-api-sign-url)
[![Total Downloads](https://poser.pugx.org/bentools/gmaps-api-sign-url/downloads)](https://packagist.org/packages/bentools/gmaps-api-sign-url)

# Google Static Maps API Url Signer

Yes, it's a long name for such a simple library. When you use Google Static maps API, your key can be stolen if you don't sign your Urls.

Retrieve your secret key in your Google cloud Dashboard: APIs > Maps Static API > Url signing secret.

## Installation

> composer require bentools/gmaps-api-sign-url

## Tests

> ./vendor/bin/phpunit

## Usage

```php
use BenTools\GmapsApiSigner\GmapsUrlSigner;

$secretKey = 'google_api_signing_secret';
$sign = new GmapsUrlSigner($secretKey);
```

```html
<html>
<body>
<script src="<?=$sign('https://maps.googleapis.com/maps/api/js?key=api_key')?>"></script>
</body>
</html>
```