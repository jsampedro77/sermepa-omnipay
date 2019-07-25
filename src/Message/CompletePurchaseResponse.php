<?php

namespace Omnipay\Sermepa\Message;

use Omnipay\Common\Message\AbstractResponse;
use Redsys\Messages\Messages;

/**
 * Sermepa (Redsys) Complete Purchase Response
 */
class CompletePurchaseResponse extends AbstractResponse
{
    /**
     * @return bool
     */
    public function isSuccessful()
    {
        if ($this->data['success'] === true) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        $messageData = Messages::getByCode($this->data['decodedParameters']['Ds_Response']);

        if ($messageData) {
            $message = $messageData['code']. ' - ' . $messageData['message'];
            if ($messageData['detail']) {
                $message .= '. '. $messageData['detail'];
            }
        } else {
            $message = $this->data['decodedParameters']['Ds_Response'];
        }

        return $message;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->data['decodedParameters']['Ds_Response'];
    }

    /**
     * @return mixed
     */
    public function getTransactionReference()
    {
        return $this->data['decodedParameters']['Ds_AuthorisationCode'];
    }
    
    /**
     * @return string
     */
    public function getTransactionId()
    {
        return $this->data['decodedParameters']['Ds_Order'];
    }
}
