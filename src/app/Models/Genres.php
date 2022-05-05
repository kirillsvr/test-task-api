<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function games()
    {
        return $this->belongsToMany(Genres::class, 'game_genre', 'genre_id', 'game_id');
    }
}
