<?php
namespace Omnipay\Sermepa\Encryptor;

/**
 * Created by PhpStorm.
 * User: javier
 * Date: 10/11/15
 * Time: 21:31
 */
class Encryptor
{
    static public function encrypt_3DES($message, $key)
    {
        return mcrypt_encrypt(
            MCRYPT_3DES,
            $key,
            $message,
            MCRYPT_MODE_CBC,
            implode(array_map("chr", array(0, 0, 0, 0, 0, 0, 0, 0)))
        );
    }
}