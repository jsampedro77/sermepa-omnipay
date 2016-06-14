<?php

namespace Omnipay\Sermepa\Message;

use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Sermepa\Encryptor\Encryptor;

/**
 * Sermepa (Redsys) Purchase Request
 *
 * @author Javier Sampedro <jsampedro77@gmail.com>
 * @author NitsNets Studio <github@nitsnets.com>
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

    /**
     * Sets the identifier on the purchase request.
     *
     * @param string $identifier Identifier to be set on the purchase request
     *
     * @return object
     */
    public function setIdentifier($identifier)
    {
        return $this->setParameter('identifier', $identifier);
    }

    /**
     * Gets the identifier parameter setup on the purchase request.
     *
     * @return mixed
     */
    public function getIdentifier()
    {
        return $this->getParameter('identifier');
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

        if (!empty($this->getParameter('identifier'))) {
            $data['Ds_Merchant_Identifier'] = $this->getParameter('identifier');
        }

        $merchantParameters = base64_encode(json_encode($data));

        return array(
            'Ds_MerchantParameters' => $merchantParameters,
            'Ds_Signature' => $this->generateSignature($merchantParameters),
            'Ds_SignatureVersion' => 'HMAC_SHA256_V1'
        );

    }

    public function sendData($data)
    {
        return $this->response = new PurchaseResponse($this, $data);
    }

    public function getEndpoint()
    {
        return $this->getEndpointBase().'/sis/realizarPago';
    }

    public function getEndpointBase()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }

    protected function generateSignature($merchantParameters)
    {
        $key = base64_decode($this->getParameter('merchantKey'));
        $key = Encryptor::encrypt_3DES($this->getToken(), $key);
        $res = hash_hmac('sha256', $merchantParameters, $key, true);

        return base64_encode($res);
    }
}
