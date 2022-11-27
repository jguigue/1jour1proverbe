<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proverbe extends Model
{
    protected $table = 'proverbes';
    protected $primaryKey = "id";
    protected $fillable = [
        'proverbe',
        'auteur',
    ];

    use HasFactory;
}