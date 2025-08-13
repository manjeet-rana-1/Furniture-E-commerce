<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faqs extends Model
{
    protected $fillable = [
        'id',
        'question',
        'answer',
        ];
}
