<?php

namespace Omnipay\Sermepa\Message;

use Omnipay\Common\Message\AbstractRequest;

/**
 * Sermepa (Redsys) Purchase Request
 *
 * @author Javier Sampedro <jsampedro77@gmail.com>
 */
class PurchaseRequest extends AbstractRequest
{

    protected $liveEndpoint = 'https://sis.redsys.es';
    protected $testEndpoint = 'https://sis-t.redsys.es:25443';

    public function setOrder($order)
    {
        return $this->setParameter('order', $order);
    }

    public function setTitular($titular)
    {
        return $this->setParameter('titular', $titular);
    }

    public function setConsumerLanguage($consumerLanguage)
    {
        return $this->setParameter('consumerLanguage', $consumerLanguage);
    }

    public function setMerchantCode($merchantCode)
    {
        return $this->setParameter('merchantCode', $merchantCode);
    }

    public function setMerchantName($merchantName)
    {
        return $this->setParameter('merchantName', $merchantName);
    }

    public function setMerchantURL($merchantURL)
    {
        return $this->setParameter('merchantURL', $merchantURL);
    }

    public function setMerchantKey($merchantKey)
    {
        $this->setParameter('merchantKey', $merchantKey);
    }

    public function setTerminal($terminal)
    {
        return $this->setParameter('terminal', $terminal);
    }

    public function getTransactionType()
    {
        return '0';
    }

    public function setSignatureMode($signatureMode)
    {
        $this->setParameter('signatureMode', $signatureMode);
    }

    public function getData()
    {
        $data = array();
        $data['Ds_Merchant_Amount'] = (float)$this->getAmount();
        $data['Ds_Merchant_Currency'] = $this->getCurrency();
        $data['Ds_Merchant_Order'] = $this->getToken();
        $data['Ds_Merchant_ProductDescription'] = $this->getDescription();

        $data['Ds_Merchant_Titular'] = $this->getParameter('titular');
        $data['Ds_Merchant_ConsumerLanguage'] = $this->getParameter('consumerLanguage');
        $data['Ds_Merchant_MerchantCode'] = $this->getParameter('merchantCode');
        $data['Ds_Merchant_MerchantName'] = $this->getParameter('merchantName');
        $data['Ds_Merchant_MerchantURL'] = $this->getParameter('merchantURL');
        $data['Ds_Merchant_Terminal'] = $this->getParameter('terminal');
        $data['Ds_Merchant_TransactionType'] = $this->getTransactionType();

        $data['Ds_Merchant_UrlOK'] = $this->getReturnUrl();
        $data['Ds_Merchant_UrlKO'] = $this->getCancelUrl();

        $data['Ds_Merchant_MerchantSignature'] = $this->generateSignature($data);


        return $data;
    }

    public function sendData($data)
    {
        return $this->response = new PurchaseResponse($this, $data);
    }

    public function getEndpoint()
    {
        return $this->getEndpointBase() . '/sis/realizarPago';
    }

    public function getEndpointBase()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }

    protected function generateSignature($data)
    {
        $message = $data['Ds_Merchant_Amount'] .
                $data['Ds_Merchant_Order'] .
                $data['Ds_Merchant_MerchantCode'] .
                $data['Ds_Merchant_Currency'];

        if ('full' === $this->getParameter('signatureMode')) {
            $message .= $data['Ds_Merchant_TransactionType'] .
                    $data['Ds_Merchant_MerchantURL'];
        }

        $message .= $this->getParameter('merchantKey');

        return sha1($message);
    }
}
