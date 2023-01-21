<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'color',
        'img',
        'stock',
        'price',
        'description',
    ];

    public static function search($search)
    {
        return empty($search)
        ? static::query()
        : static::query()->where('id', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search . '%')
            ->orWhere('category', 'like', '%' . $search . '%')
            ->orWhere('color', 'like', '%' . $search . '%')
            ->orWhere('stock', 'like', '%' . $search . '%')
            ->orWhere('price', 'like', '%' . $search . '%');
    }
}
