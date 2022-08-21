<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\CardDetails;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CardController extends Controller
{
    private string $return_url = "/basket";

    public function index(): View
    {
        $card = $this->getOrCreatecard();
        return view("frontend.card.index", ["card" => $card]);
    }

    /**
     *
     * Lists the card content
     *
     * @return Card
     */
    private function getOrCreatecard(): Card
    {
        $user = Auth::user();
        $card = Card::firstOrCreate(
            ['user_id' => $user->user_id, 'deleted_at' => null],
            ['code' => Str::random(8)]
        );
        return $card;
    }

    /**
     * Add product as card detail
     *
     * @param Product $product
     * @param int $quantity
     * @return RedirectResponse
     */
    public function add(Product $product, int $quantity = 1): RedirectResponse
    {
        $card = $this->getOrCreatecard();
        $card->details()->create([
            "product_id" => $product->product_id,
            "quantity" => $quantity,
        ]);

        return redirect($this->return_url);
    }

    /**
     *
     * Remove card detail from card
     *
     * @param CardDetails $cardDetails
     * @return RedirectResponse
     */
    public function remove(CardDetails $cardDetails): RedirectResponse
    {
        $cardDetails->delete();
        return redirect($this->return_url);
    }
}
