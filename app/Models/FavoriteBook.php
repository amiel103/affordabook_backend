<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteBook extends Model
{
    use HasFactory;

    protected $table = 'favorite_books';

    protected $fillable = ['user_id', 'book_title', 'author'];
}
