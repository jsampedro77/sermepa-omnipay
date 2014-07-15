<?php

namespace Omnipay\Sermepa\Exception;

/**
 * Description of CallbackException
 *
 * @author Javier Sampedro <jsampedro77@gmail.com>
 */
class CallbackException extends \Exception
{
    protected $message = 'Sermepa callback returned an error status code';
}
