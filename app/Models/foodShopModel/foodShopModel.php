<?php

namespace App\Models\foodShopModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
use Auth;
use Str;


class foodShopModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'foodShop';
    public $timestamps = true;
}
