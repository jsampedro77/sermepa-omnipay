Omnipay: RedSys
===============

**RedSys driver for the Omnipay PHP payment processing library**

[Omnipay](https://github.com/thephpleague/omnipay) is a framework agnostic, multi-gateway payment
processing library for PHP 5.3+. This package implements RedSys (formerly Sermepa) support for Omnipay.

Requirements
------------
- PHP >= 5.3
- Composer (`curl -s http://getcomposer.org/installer | php`)

Installation
------------

Omnipay is installed via [Composer](http://getcomposer.org/). To install, simply run:

```sh
composer require nazka/sermepa-omnipay
```

Basic Usage
-----------

For general usage instructions, please see the main [Omnipay](https://github.com/thephpleague/omnipay)
repository.

Aditional Parameter
-----------

If you want to avoid having to multiply the value by 100 just add a new parameter ( multiply=true ) to the purchase function. 

Aditional Callback
-----------
Redsys has an additional callback ( Respuesta online ) that may be active in your redsys platform and therfore must be implemented. This new callback cannot follow the normal usage of Omnipay. 
You need to implement checkCallbackResponse() and decodeCallbackResponse().
