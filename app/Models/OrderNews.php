<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderNews extends Model
{
    use HasFactory;

    protected $table = 'order_news';

    protected $fillable = [
        'user_name',
        'phone',
        'email',
        'news_id'
    ];
}
