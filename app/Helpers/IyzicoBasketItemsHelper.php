<?php

namespace App\Helpers;

use App\Models\Card;
use Iyzipay\Model\BasketItem;
use Iyzipay\Model\BasketItemType;

class IyzicoBasketItemsHelper
{
    /**
     * @param Card $card
     * @return array
     */
    public static function getBasketItems(Card $card): array
    {
        $basketItems = array();
        foreach ($card->details as $detail) {
            $basketItem = new BasketItem();
            $basketItem->setId($detail->product->product_id);
            $basketItem->setName($detail->product->name);
            $basketItem->setCategory1($detail->product->category->name);
            $basketItem->setItemType(BasketItemType::PHYSICAL);
            $basketItem->setPrice($detail->product->price);

            for ($i = 0; $i < $detail->quantity; $i++) {
                //array_push($basketItems, $basketItem);
                $basketItems[] = $basketItem;
            }
        }

        return $basketItems;
    }
}
