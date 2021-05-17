<?php

namespace Omnipay\Sermepa\Message;

use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Sermepa\Encryptor\Encryptor;
use \Money\Currencies\ISOCurrencies;
use \Money\Currency;

/**
 * Sermepa (Redsys) Purchase Request
 *
 * @author Javier Sampedro <jsampedro77@gmail.com>
 * @author NitsNets Studio <github@nitsnets.com>
 */
class RecurrentPurchase3dsRequest extends Purchase3dsRequest
{
    /**
     * @return string
     */
    public function getTransactionType()
    {
        return 'L';
    }
}
