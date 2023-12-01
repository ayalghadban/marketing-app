<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Shopping extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'user_id',
        'image'
    ];
    public function user() : HasOne
    {
        return $this->hasOne(User::class);
    }
    public function category() : HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function publish()
    {

    }
    public function block() :HasOne
    {
        return $this->hasOne(BlockUserShop::class);
    }
}
