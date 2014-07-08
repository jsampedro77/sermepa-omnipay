<?php

namespace Nazka\SermepaOmnipay\Message;

use Omnipay\Common\Message\AbstractRequest;

/**
 * Sermepa (Redsys) Purchase Request
 *
 * @author Javier Sampedro <jsampedro77@gmail.com>
 */
class PurchaseRequest extends AbstractRequest
{

    protected $liveEndpoint = 'https://sis.sermepa.es';
    protected $testEndpoint = 'https://sis-t.redsys.es:25443';

    public function setTitular($titular)
    {
        return $this->setParameter('titular', $titular);
    }

    public function getTitular()
    {
        return $this->getParameter('titular');
    }

    public function setConsumerLanguage($consumerLanguage)
    {
        return $this->setParameter('consumerLanguage', $consumerLanguage);
    }

    public function getConsumerLanguage()
    {
        return $this->getParameter('consumerLanguage');
    }

    public function getCurrency()
    {
        return $this->getParameter('currency');
    }

    public function setOrder($order)
    {
        return $this->setParameter('order', $order);
    }

    public function getOrder()
    {
        return $this->getParameter('order');
    }

    public function setMerchantKey($merchantKey)
    {
        return $this->setParameter('merchantKey', $merchantKey);
    }

    public function getMerchantKey()
    {
        return $this->getParameter('merchantKey');
    }

    public function setMerchantCode($merchantCode)
    {
        return $this->setParameter('merchantCode', $merchantCode);
    }

    public function getMerchantCode()
    {
        return $this->getParameter('merchantCode');
    }

    public function setTerminal($terminal)
    {
        return $this->setParameter('terminal', $terminal);
    }

    public function getTerminal()
    {
        return $this->getParameter('terminal');
    }

    public function setProductDescription($productDescription)
    {
        return $this->setParameter('productDescription', $productDescription);
    }

    public function getProductDescription()
    {
        return $this->getParameter('productDescription');
    }

    public function setMerchantURL($merchantUrl)
    {
        return $this->setParameter('merchantUrl', $merchantUrl);
    }

    public function getMerchantURL()
    {
        return $this->getParameter('merchantUrl');
    }

    public function setTransactionType($transactionType)
    {
        return $this->setParameter('transactionType', $transactionType);
    }

    public function getTransactionType()
    {
        return $this->getParameter('transactionType');
    }

    public function setMerchantName($merchantName)
    {
        return $this->setParameter('merchantName', $merchantName);
    }

    public function getMerchantName()
    {
        return $this->getParameter('merchantName');
    }

    public function setUrlKo($url)
    {
        return $this->setParameter('urlKo', $url);
    }

    public function getUrlKo()
    {
        return $this->getParameter('urlKo');
    }

    public function setUrlOk($url)
    {
        return $this->setParameter('urlOk', $url);
    }

    public function getUrlOk()
    {
        return $this->getParameter('urlOk');
    }

    public function setSignatureMode($signatureMode)
    {
        return $this->setParameter('signatureMode', $signatureMode);
    }

    public function getSignatureMode()
    {
        return $this->getParameter('signatureMode');
    }

    public function getData()
    {
        $data = array();
        $data['Ds_Merchant_Amount'] = $this->getAmount() * 100;
        $data['Ds_Merchant_Titular'] = $this->getTitular();
        $data['Ds_Merchant_ConsumerLanguage'] = $this->getConsumerLanguage();
        $data['Ds_Merchant_Currency'] = $this->getCurrency();
        $data['Ds_Merchant_Order'] = $this->getOrder();
        $data['Ds_Merchant_MerchantCode'] = $this->getMerchantCode();
        $data['Ds_Merchant_Terminal'] = $this->getTerminal();
        $data['Ds_Merchant_ProductDescription'] = $this->getProductDescription();
        $data['Ds_Merchant_MerchantURL'] = $this->getMerchantURL();
        $data['Ds_Merchant_TransactionType'] = $this->getTransactionType();
        $data['Ds_Merchant_MerchantName'] = $this->getMerchantName();
        $data['Ds_Merchant_UrlOK'] = $this->getUrlOk();
        $data['Ds_Merchant_UrlKO'] = $this->getUrlKo();

        $data['Ds_Merchant_MerchantSignature'] = $this->generateSignature($data);


        return $data;
    }

    public function send()
    {

        $request = $this->httpClient->post($this->getEndpoint(), null, $this->getData(), array());
        $request->getCurlOptions()->set(CURLOPT_SSLVERSION, 3);

        $httpResponse = $request->send();

        return $this->response = new PurchaseResponse($this, $httpResponse->getBody());
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

        $message .= $this->getMerchantKey();

        return sha1($message);
    }
}
