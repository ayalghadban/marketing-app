<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'shop_id','can_publish'];

    public function user() 
    {

    }
    public function shop(){

    }
}
