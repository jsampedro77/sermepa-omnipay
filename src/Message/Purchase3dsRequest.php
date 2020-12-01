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
        return $data;
    }
}
