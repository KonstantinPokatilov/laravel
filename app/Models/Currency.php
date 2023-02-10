<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $table = 'currency';

    protected $fillable = [
        'Name',
        'CharCode',
        'Value',
    ];

    protected $casts = [
        'Value' => 'integer'
    ];
}
