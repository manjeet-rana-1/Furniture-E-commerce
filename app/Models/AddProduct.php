<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddProduct extends Model
{
    protected $table="add_products";

    protected $fillable = [
        'product_name',
        'product_price',
        'product_description',
        'product_quantity',
        'product_category',
        'product_image',
    ];
    public function category(){
        return $this->belongsTo(category::class, 'product_category','id');
        }

        public function images()
{
    return $this->hasMany(Images::class, 'product_id');
}
}
