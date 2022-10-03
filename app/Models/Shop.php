<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User;

class Shop extends Model
{
    use HasFactory;

    protected $table = 'shop';

    protected $casts = [
        'characteristics' => 'array'
    ];

    protected $fillable = [
        'shop_name',
        'branch',
        'description',
        'cpf',
        'number',
        'address',
        'income',
        'characteristics',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
