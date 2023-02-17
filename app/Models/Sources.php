<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sources extends Model
{
    use HasFactory;

    protected $table = 'sources';

    protected $fillable = [
        'title',
        'link',
    ];

}
