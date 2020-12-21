<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
use Auth;
use Str;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'product';
    public $timestamps = true;
}
