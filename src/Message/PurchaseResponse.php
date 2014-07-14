<?php

namespace Nazka\SermepaOmnipay\Message;

use Omnipay\Common\Message\AbstractResponse;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

/**
 * Sermepa (Redsys) Purchase Response
 */
class PurchaseResponse extends AbstractResponse
{

    public function isSuccessful()
    {
        return true;
    }

    public function isRedirect()
    {
        return false;
    }

    public function getHttpResponse(){

        return HttpResponse::create((string)$this->data);
    }
}
