<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image ', 'price', 'description' ,
     'category_id','discount', 'end_time_discount'];

    public function category() :BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function sale() :HasMany
    {
        return $this->hasMany(Sales::class);
    }
}
