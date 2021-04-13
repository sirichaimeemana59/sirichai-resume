<?php

namespace App\Models\Pets;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
use Auth;
use Str;

class PetModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pet';
    protected $table = 'pets';
    public $timestamps = true;
}
