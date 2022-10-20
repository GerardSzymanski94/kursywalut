<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'currency_code', 'exchange_rate'];

    protected function exchangeRate(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value / 1000,
            set: fn($value) => $value * 1000,
        );
    }
}
