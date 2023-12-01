<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BlockUserShop extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'shop_id', 'end_date'];
    public function shop() : HasOne{
        return $this->hasOne(Shopping::class);
    }
    public function user() : HasOne{
        return $this->hasOne(User::class);
    }
}
