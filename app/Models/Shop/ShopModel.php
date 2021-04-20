<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
use Auth;
use Str;

class ShopModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'shop';
    public $timestamps = true;
}

