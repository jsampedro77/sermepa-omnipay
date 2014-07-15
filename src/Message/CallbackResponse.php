<?php

namespace Omnipay\Sermepa\Message;

use Symfony\Component\HttpFoundation\Request;

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
    }

    public function isSuccessful()
    {
        $data = $this->request->request->all();
        //check response code "000" to "099"
        if (100 > (int) $data['Ds_Response']) {
            return $this->checkSignature($data);
        } else {
            return false;
        }
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
