<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gameturn extends Model
{
    public static $players = [1,2];
    public static $positions = ['a1','a2','a3','b1','b2','b3','c1','c2','c2'];
    protected $hidden = ['id','created_at','updated_at'];

    use HasFactory;
}
