<?php

namespace MM\SermepaOmnipayBundle;

use Symfony\Component\HttpFoundation\Request;
use Omnipay\Common\AbstractGateway;
use MM\SermepaOmnipayBundle\Gateway\Message\CallbackResponse;

/**
 * Sermepa (Redsys) Gateway
 *
 * @author Javier Sampedro <jsampedro77@gmail.com>
 */
class SermepaGateway extends AbstractGateway
{

    public function getDefaultParameters()
    {
        return array(
            'titular' => '',
            'consumerLanguage' => '001',
            'currency' => '978',
            'terminal' => '001',
            'merchantUrl' => '',
            'merchantName' => '',
            'transactionType' => '0',
            'signatureMode' => 'simple',
            'testMode' => false
        );
    }

    public function setMerchantName($merchantName)
    {
        $this->setParameter('merchantName', $merchantName);
        $this->setParameter('titular', $merchantName); //is this right??
    }

    public function setMerchantKey($merchantKey)
    {
        $this->setParameter('merchantKey', $merchantKey);
    }

    public function setMerchantCode($merchantCode)
    {
        $this->setParameter('merchantCode', $merchantCode);
    }

    public function setTerminal($terminal){
        $this->setParameter('terminal', $terminal);
    }

    public function setSignatureMode($signatureMode){
        $this->setParameter('signatureMode', $signatureMode);
    }

    public function getName()
    {
        return 'Sermepa';
    }

    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Nazka\SermepaOmnipay\Gateway\Message\PurchaseRequest', $parameters);
    }

    /**
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return type
     */
    public function checkCallbackResponse(Request $request)
    {
        $response = new CallbackResponse($request, $this->getParameter('merchantKey'));

        return $response->isSuccessful();
    }
}
