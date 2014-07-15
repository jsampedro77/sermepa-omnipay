<?php

namespace Omnipay\Sermepa\Message;

use Symfony\Component\HttpFoundation\Request;
use Omnipay\Sermepa\Exception\BadSignatureException;
use Omnipay\Sermepa\Exception\CallbackException;

/**
 * Sermepa (Redsys)  Callback Response
 */
class CallbackResponse
{

    private $request;
    private $merchantKey;

    public function __construct(Request $request, $merchantKey)
    {
        $this->request = $request;
        $this->merchantKey = $merchantKey;
        $this->error = '';
    }

    /**
     * Check callback response from tpv
     * 
     * @return boolean
     * @throws BadSignatureException
     * @throws CallbackException
     */
    public function isSuccessful()
    {
        $data = $this->request->request->all();

        if (!$this->checkSignature($data)) {
            throw new BadSignatureException();
        }

        //check response, code "000" to "099" means success
        if ((int) $data['Ds_Response'] > 99) {
            throw new CallbackException(null, (int) $data['Ds_Response']);
        }

        return true;
    }

    private function checkSignature($data)
    {
        $message = $data['Ds_Amount'] .
                $data['Ds_Order'] .
                $data['Ds_MerchantCode'] .
                $data['Ds_Currency'] .
                $data['Ds_Response'] .
                $this->merchantKey;

        $signature = strtoupper(sha1($message));

        return ($signature == $data['Ds_Signature']);
    }
}
