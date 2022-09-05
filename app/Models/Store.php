<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $table = 'store';

    protected $fillable = [
        'name',
        'branch',
        'description',
        'cpf',
        'number',
        'place'
    ];
}
