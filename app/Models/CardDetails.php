<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Symfony\Component\Translation\t;

class CardDetails extends Model
{
    use HasFactory;

    protected $primaryKey = "card_details_id";

    protected $fillable = [
        'card_details_id',
        'card_id',
        'product_id',
        'quantity'
    ];

    public function product()
    {
        return $this->hasOne(Product::class,'product_id','product_id');
    }
}
