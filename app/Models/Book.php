<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_category',
        'title',
        'value',
        'date',
        'status',
    ];
    protected $table = 'books';
    protected $primaryKey = 'id';
}
