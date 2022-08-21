<?php

namespace App\Helpers;

use App\Models\Card;
use Iyzipay\Model\Currency;
use Iyzipay\Model\Locale;
use Iyzipay\Model\PaymentChannel;
use Iyzipay\Model\PaymentGroup;
use Iyzipay\Request\CreatePaymentRequest;

class IyzicoRequestHelper
{
    /**
     * @param Card $card
     * @param $finalPrice
     * @return CreatePaymentRequest
     */
    public static function createRequest(Card $card, float $finalPrice): CreatePaymentRequest
    {
        $request = new CreatePaymentRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId($card->code);
        $request->setPrice($finalPrice);
        $request->setPaidPrice($finalPrice);
        $request->setCurrency(Currency::USD);
        $request->setInstallment(1);
        $request->setBasketId($card->code);
        $request->setPaymentChannel(PaymentChannel::WEB);
        $request->setPaymentGroup(PaymentGroup::PRODUCT);

        return $request;
    }
}
