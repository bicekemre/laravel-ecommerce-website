<?php

namespace App\Helpers;

use Iyzipay\Model\Address;

class IyzicoAddressHelper
{
    /**
     * @return Address
     */
    public static function getAddress(): Address
    {
        $address = new Address();
        $address->setContactName("Emre Biçek");
        $address->setCity("Istanbul");
        $address->setCountry("Turkey");
        $address->setAddress("sdaddsf");
        $address->setZipCode("34742");
        return $address;
    }
}
