<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'imageable_id',
        'imageable_type'
    ];

    protected $hidden = [
        'imageable_id',
        'imageable_type'
    ];

    public function imageable()
    {
        return $this->morphTo();
    }

    public function product()
    {
        return $this->morphMany(Product::class, 'imageable');
    }

    public function categories()
    {
        return $this->morphMany(Category::class, 'imageable');
    }
}
