<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =[
        'category_id',
        'sku',
        'name',
        'description',
        'short_description',
        'price',
        'discount',
        'quantity',
        'thumbnail'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity', 'price');
    }

    public function image()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
