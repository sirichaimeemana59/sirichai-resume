<?php

namespace App\Models\Resume;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resume extends Model
{
    use HasFactory;
    protected $table='resume';
    protected $primaryKey ='id';
    public $timestamps=true;

    public function join_cat(){
        return $this->hasOne('app\Models\Category\Category','cat_id','id');
    }
}
