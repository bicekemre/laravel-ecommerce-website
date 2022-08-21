<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = "address";

    protected $fillable = [
        "id",
        "user_id",
        "city",
        "district",
        "zipcode",
        "address",
        "is_default"
    ];
}
