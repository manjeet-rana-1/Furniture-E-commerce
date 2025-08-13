<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $fillable = ['add_product_id', 'image_path'];

    public function product()
    {
        return $this->belongsTo(AddProduct::class, 'add_product_id');
    }
}
