<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
use Auth;
use Str;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function join_cat(){
        return $this->hasOne('app\Models\Category\Category','cat_id','id');
}
}
