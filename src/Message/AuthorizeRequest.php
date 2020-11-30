<?php

namespace Omnipay\Sermepa\Message;

/**
 * Sermepa (Redsys) Authorize Request
 *
 * @author Nerburish <nerburish@gmail.com>
 */
class AuthorizeRequest extends PurchaseRequest
{
    public function getTransactionType()
    {
        return '1';
    }
}
