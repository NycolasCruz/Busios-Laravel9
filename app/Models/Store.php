<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User;

class Store extends Model
{
    use HasFactory;

    protected $table = 'store';

    protected $casts = [
        'extras' => 'array'
    ];

    protected $fillable = [
        'name',
        'branch',
        'description',
        'cpf',
        'number',
        'place',
        'income',
        'extras',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
