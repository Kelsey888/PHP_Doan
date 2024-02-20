<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genres_books;
use App\Models\Images;
use App\Models\Author;

class Books extends Model
{
    protected $table= 'books';
    protected $hidden=['created_at', 'updated_at'];
    public function author() {
        return $this->belongsTo(Author::class);
    }
    public function genres_books()
    {
        return $this->hasMany(Genres_books::class)->with('genre');
    }
    public function images()
    {
        return $this->hasMany(Images::class);
    }
}
