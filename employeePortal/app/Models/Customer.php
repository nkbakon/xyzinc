<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'status',
        'password',
    ];

    public static function search($search)
    {
        return empty($search)
        ? static::query()
        : static::query()->where('id', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('status', 'like', '%' . $search . '%');
    }

    public function getStatusColorAttribute()
    {
        return [
            'Active' => 'green',
            'Deactivate' => 'red',
        ][$this->status] ?? 'cool-gray';
    }

    protected $hidden = [
        'password', 'remember_token',
    ];
}
