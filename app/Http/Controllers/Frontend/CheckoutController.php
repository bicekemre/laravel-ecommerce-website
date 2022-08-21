<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\IyzicoAddressHelper;
use App\Helpers\IyzicoBuyerHelper;
use App\Helpers\IyzicoOptionsHelper;
use App\Helpers\IyzicoPaymentCardHelper;
use App\Helpers\IyzicoRequestHelper;
use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\CreditCard;
use App\Models\Invoice;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Iyzipay\Model\BasketItem;
use Iyzipay\Model\BasketItemType;
use Iyzipay\Model\Payment;

class CheckoutController extends Controller
{
    /**
     * Shows the payment form
     *
     * @return View
     */
    public function showCheckoutForm(): View
    {
        return view("frontend.card.checkout_form");
    }

    public function checkout(Request $request): View
    {
        $creditCard = new CreditCard();
        $data = $this->prepare($request, $creditCard->getFillable());
        $creditCard->fill($data);

        $user = Auth::user();

        $total = $this->calculateCardTotal();

        $card = $this->getOrCreateCard();


        $request = IyzicoRequestHelper::createRequest($card, $total);

        $paymentCard = IyzicoPaymentCardHelper::getPaymentCard($creditCard);
        $request->setPaymentCard($paymentCard);

        $buyer = IyzicoBuyerHelper::getBuyer();
        $request->setBuyer($buyer);

        $shippingAddress = IyzicoAddressHelper::getAddress();
        $request->setShippingAddress($shippingAddress);

        $billingAddress = IyzicoAddressHelper::getAddress();
        $request->setBillingAddress($billingAddress);

        $basketItems = $this->getBasketItems();
        $request->setBasketItems($basketItems);

        $options = IyzicoOptionsHelper::getTestOptions();

        $payment = Payment::create($request, $options);

        if ($payment->getStatus() == "success") {

            $this->finalizeCard($card);

            $order = $this->createOrderWithDetails($card);

               $this->createInvoiceWithDetails($order);

            return view("frontend.checkout.success");

        } else {
            $errorMessage = $payment->getErrorMessage();
            return view("frontend.checkout.error", ["message" => $errorMessage]);
        }
    }

    private function calculateCardTotal(): float
    {
        $total = 0;
        $card = $this->getOrCreateCard();
        $cardDetails = $card->details;
        foreach ($cardDetails as $detail) {
            $total += $detail->product->price * $detail->quantity;
        }

        return $total;
    }

    private function getOrCreateCard(): Card
    {
        $user = Auth::user();
        $card = Card::firstOrCreate(
            ['user_id' => $user->user_id, 'deleted_at' => null],
            ['code' => Str::random(8)]
        );
        return $card;
    }

    private function getBasketItems(): array
    {
        $basketItems = array();
        $card = $this->getOrCreateCard();
        $cardDetails = $card->details;

        foreach ($cardDetails as $detail) {
            $item = new BasketItem();
            $item->setId($detail->product->product_id);
            $item->setName($detail->product->name);
            $item->setCategory1($detail->product->category->name);
            $item->setItemType(BasketItemType::PHYSICAL);
            $item->setPrice($detail->product->price);

            for ($i = 0; $i < $detail->quantity; $i++) {
                array_push($basketItems, $item);
            }
        }

        return $basketItems;
    }

    private function finalizeCard(Card $card)
    {
        $card->is_active = false;
        $card->save();
    }

    private function createOrderWithDetails(Card $card): Order
    {
        $order = new Order([
            "card_id" => $card->card_id,
            "code" => $card->code
        ]);
        $order->save();

        foreach ($card->details as $detail) {
            $order->details()->create([
                'order_id' => $order->order_id,
                'product_id' => $detail->product_id,
                'quantity' => $detail->quantity
            ]);
        }

        return $order;
    }

    private function createInvoiceWithDetails(Order $order)
    {
        $invoice = new Invoice([
            "card_id" => $order->order_id,
            "code" => $order->code
        ]);

        foreach ($order->details as $detail) {
            $invoice->details()->create([
                'invoice_id' => $invoice->invoice_id,
                'product_id' => $detail->product_id,
                'quantity' => $detail->quantity,
                'unit_price' => $detail->product->price,
                'total' => ($detail->quantity * $detail->product->price),
            ]);
        }

    }
}
