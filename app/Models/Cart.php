<?php

namespace App\Models;
use App\Models\AddProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'product_image',
        'product_name',
        'product_price',
        ];
       public function product(){
        return $this->belongsTo(AddProduct::class, 'product_id');
       }
}
