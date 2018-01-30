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
        $l = ceil(strlen($message) / 8) * 8;
        return substr(openssl_encrypt($message . str_repeat("\0", $l - strlen($message)), 'des-ede3-cbc', $key, OPENSSL_RAW_DATA, "\0\0\0\0\0\0\0\0"), 0, $l);
    }
}