<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sales extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'product_id', 'profit'];
    public function user() :HasMany
    {
        return $this->hasMany(User::class);
    }
    public function product() :HasMany
    {
        return $this->hasMany(Product::class);
    }
}
