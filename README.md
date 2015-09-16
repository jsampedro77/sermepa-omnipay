Omnipay: RedSys
===============

**RedSys driver for the Omnipay PHP payment processing library**

[Omnipay](https://github.com/thephpleague/omnipay) is a framework agnostic, multi-gateway payment
processing library for PHP 5.3+. This package implements RedSys (formerly Sermepa) support for Omnipay.

Installation
------------

Omnipay is installed via [Composer](http://getcomposer.org/). To install, simply add it to your `composer.json` file:

```json
{
    "require": {
        "nazka/sermepa-omnipay": "dev-master"
    }
}
```

And run composer to update your dependencies:

    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar update

Basic Usage
-----------

For general usage instructions, please see the main [Omnipay](https://github.com/thephpleague/omnipay)
repository.