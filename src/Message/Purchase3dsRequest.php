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
class Purchase3dsRequest extends PurchaseRequest
{
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setCardholderName($value)
    {
        return $this->setParameter('cardholderName', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setEmail($value)
    {
        return $this->setParameter('email', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setHomePhonePrefix($value)
    {
        return $this->setParameter('homePhonePrefix', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setHomePhone($value)
    {
        return $this->setParameter('homePhone', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setMobilePhonePrefix($value)
    {
        return $this->setParameter('mobilePhonePrefix', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setMobilePhone($value)
    {
        return $this->setParameter('mobilePhone', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setWorkPhonePrefix($value)
    {
        return $this->setParameter('workPhonePrefix', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setWorkPhone($value)
    {
        return $this->setParameter('workPhone', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setShipAddrLine1($value)
    {
        return $this->setParameter('shipAddrLine1', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setShipAddrLine2($value)
    {
        return $this->setParameter('shipAddrLine2', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setShipAddrLine3($value)
    {
        return $this->setParameter('shipAddrLine3', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setShipAddrCity($value)
    {
        return $this->setParameter('shipAddrCity', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setShipAddrPostCode($value)
    {
        return $this->setParameter('shipAddrPostCode', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setShipAddrState($value)
    {
        return $this->setParameter('shipAddrState', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setShipAddrCountry($value)
    {
        return $this->setParameter('shipAddrCountry', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setBillAddrLine1($value)
    {
        return $this->setParameter('billAddrLine1', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setBillAddrLine2($value)
    {
        return $this->setParameter('billAddrLine2', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setBillAddrLine3($value)
    {
        return $this->setParameter('billAddrLine3', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setBillAddrCity($value)
    {
        return $this->setParameter('billAddrCity', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setBillAddrPostCode($value)
    {
        return $this->setParameter('billAddrPostCode', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setBillAddrState($value)
    {
        return $this->setParameter('billAddrState', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setBillAddrCountry($value)
    {
        return $this->setParameter('billAddrCountry', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setAddrMatch($value)
    {
        return $this->setParameter('addrMatch', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setChallengeWindowSize($value)
    {
        return $this->setParameter('challengeWindowSize', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setAcctID($value)
    {
        return $this->setParameter('acctID', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setThreeDSReqAuthMethod($value)
    {
        return $this->setParameter('threeDSReqAuthMethod', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setThreeDSReqAuthTimestamp($value)
    {
        return $this->setParameter('threeDSReqAuthTimestamp', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setChAccAgeInd($value)
    {
        return $this->setParameter('chAccAgeInd', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setChAccDate($value)
    {
        return $this->setParameter('chAccDate', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setChAccChange($value)
    {
        return $this->setParameter('chAccChange', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setChAccChangeInd($value)
    {
        return $this->setParameter('chAccChangeInd', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function sethAccPwChange($value)
    {
        return $this->setParameter('chAccPwChange', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setChAccPwChangeInd($value)
    {
        return $this->setParameter('chAccPwChangeInd', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setNbPurchaseAccount($value)
    {
        return $this->setParameter('nbPurchaseAccount', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setProvisionAttemptsDay($value)
    {
        return $this->setParameter('provisionAttemptsDay', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setTxnActivityDay($value)
    {
        return $this->setParameter('txnActivityDay', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setTxnActivityYear($value)
    {
        return $this->setParameter('txnActivityYear', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setPaymentAccAge($value)
    {
        return $this->setParameter('paymentAccAge', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setPaymentAccInd($value)
    {
        return $this->setParameter('paymentAccInd', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setShipAddressUsage($value)
    {
        return $this->setParameter('shipAddressUsage', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setShipAddressUsageInd($value)
    {
        return $this->setParameter('shipAddressUsageInd', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setShipNameIndicator($value)
    {
        return $this->setParameter('shipNameIndicator', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setSuspiciousAccActivity($value)
    {
        return $this->setParameter('suspiciousAccActivity', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setDeliveryEmailAddress($value)
    {
        return $this->setParameter('deliveryEmailAddress', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setDeliveryTimeframe($value)
    {
        return $this->setParameter('deliveryTimeframe', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setGiftCardAmount($value)
    {
        return $this->setParameter('giftCardAmount', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setGiftCardCount($value)
    {
        return $this->setParameter('giftCardCount', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setGiftCardCurr($value)
    {
        return $this->setParameter('giftCardCurr', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setPreOrderDate($value)
    {
        return $this->setParameter('preOrderDate', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setPreOrderPurchaseInd($value)
    {
        return $this->setParameter('preOrderPurchaseInd', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setReorderItemsInd($value)
    {
        return $this->setParameter('reorderItemsInd', $value);
    }
    
    /**
     * @param $value
     *
     * @return \Omnipay\Sermepa\Message\Purchase3dsRequest
     */
    public function setShipIndicator($value)
    {
        return $this->setParameter('shipIndicator', $value);
    }
    
    /**
     * @return array|mixed
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getData()
    {
        $data = [];

        $data['Ds_Merchant_Amount'] = $this->getAmount();
        $data['Ds_Merchant_Currency'] = $this->getCurrencyRedsys();
        $data['Ds_Merchant_Order'] = $this->getTransactionId();
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
        
        $data['DS_MERCHANT_EMV3DS'] = $this->get3dsParameters();

        $merchantParameters = base64_encode(json_encode($data));

        return [
            'Ds_MerchantParameters' => $merchantParameters,
            'Ds_Signature' => $this->generateSignature($merchantParameters),
            'Ds_SignatureVersion' => 'HMAC_SHA256_V1'
        ];
    }
    
    
    /**
     *
     * @return array
     */
    protected function get3dsParameters()
    {
        $data = [];
        $data['cardholderName'] = substr($this->getParameter('cardholderName'), 0, 45);
        $data['email'] = substr($this->getParameter('email'), 0, 45);
        $data['homePhone'] = [
            "cc" => substr($this->getParameter('homePhonePrefix'), 0, 3),
            "subscriber" => substr($this->getParameter('homePhone'), 0, 15)
        ];
        $data['mobilePhone'] = [
            "cc" => substr($this->getParameter('mobilePhonePrefix'), 0, 3),
            "subscriber" => substr($this->getParameter('mobilePhone'), 0, 15)
        ];
        $data['workPhone'] = [
            "cc" => substr($this->getParameter('workPhonePrefix'), 0, 3),
            "subscriber" => substr($this->getParameter('workPhone'), 0, 15)
        ];
    
        $data['shipAddrLine1'] = substr($this->getParameter('shipAddrLine1'), 0, 50);
        $data['shipAddrLine2'] = substr($this->getParameter('shipAddrLine2'), 0, 50);
        $data['shipAddrLine3'] = substr($this->getParameter('shipAddrLine3'), 0, 50);
        $data['shipAddrCity'] = substr($this->getParameter('shipAddrCity'), 0, 50);
        $data['shipAddrPostCode'] = substr($this->getParameter('shipAddrPostCode'), 0, 16);
        $data['shipAddrState'] = substr($this->getParameter('shipAddrState'), 0, 3);
        $data['shipAddrCountry'] = substr($this->getParameter('shipAddrCountry'), 0, 3);
    
        $data['billAddrLine1'] = substr($this->getParameter('billAddrLine1'), 0, 50);
        $data['billAddrLine2'] = substr($this->getParameter('billAddrLine2'), 0, 50);
        $data['billAddrLine3'] = substr($this->getParameter('billAddrLine3'), 0, 50);
        $data['billAddrCity'] = substr($this->getParameter('billAddrCity'), 0, 50);
        $data['billAddrPostCode'] = substr($this->getParameter('billAddrPostCode'), 0, 16);
        $data['billAddrState'] = substr($this->getParameter('billAddrState'), 0, 3);
        $data['billAddrCountry'] = substr($this->getParameter('billAddrCountry'), 0, 3);
        
        $data['addrMatch'] = $this->getParameter('addrMatch');
        
        $data['challengeWindowSize'] = $this->getParameter('challengeWindowSize');
        
        $data['acctID'] = substr($this->getParameter('acctID'), 0, 3);
        $data['threeDSRequestorAuthenticationInfo'] = [
            "threeDSReqAuthData" => '',
            "threeDSReqAuthMethod" => $this->getParameter('threeDSReqAuthMethod'),
            "threeDSReqAuthTimestamp" => $this->getParameter('threeDSReqAuthTimestamp'),
        ];
        
        $data['acctInfo'] = [
            "chAccAgeInd" => $this->getParameter('chAccAgeInd'),
            "chAccDate" => $this->getParameter('chAccDate'),
            "chAccChange" => $this->getParameter('chAccChange'),
            "chAccChangeInd" => $this->getParameter('chAccChangeInd'),
            "chAccPwChange" => $this->getParameter('chAccPwChange'),
            "chAccPwChangeInd" => $this->getParameter('chAccPwChangeInd'),
            "nbPurchaseAccount" => $this->getParameter('nbPurchaseAccount'),
            "provisionAttemptsDay" => $this->getParameter('provisionAttemptsDay'),
            "txnActivityDay" => $this->getParameter('txnActivityDay'),
            "txnActivityYear" => $this->getParameter('txnActivityYear'),
            "paymentAccAge" => $this->getParameter('paymentAccAge'),
            "paymentAccInd" => $this->getParameter('paymentAccInd'),
            "shipAddressUsage" => $this->getParameter('shipAddressUsage'),
            "shipAddressUsageInd" => $this->getParameter('shipAddressUsageInd'),
            "shipNameIndicator" => $this->getParameter('shipNameIndicator'),
            'suspiciousAccActivity' => $this->getParameter('suspiciousAccActivity'),
        ];
        $data['merchantRiskIndicator'] = [
            "deliveryEmailAddress" => $this->getParameter('deliveryEmailAddress'),
            "deliveryTimeframe" => $this->getParameter('deliveryTimeframe'),
            "giftCardAmount" => $this->getParameter('giftCardAmount'),
            "giftCardCount" => $this->getParameter('giftCardCount'),
            "giftCardCurr" => $this->getParameter('giftCardCurr'),
            "preOrderDate" => $this->getParameter('preOrderDate'),
            "preOrderPurchaseInd" => $this->getParameter('preOrderPurchaseInd'),
            "reorderItemsInd" => $this->getParameter('reorderItemsInd'),
            "shipIndicator" => $this->getParameter('shipIndicator'),
            
        ];
        return json_encode($data);
    }
}
