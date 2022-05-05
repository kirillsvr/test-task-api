<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    use HasFactory;
    use Filterable;

    protected $fillable = [
        'name',
        'developer_id',
    ];

    public function developer()
    {
        return $this->belongsTo(Developers::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genres::class, 'game_genre', 'game_id', 'genre_id');
    }
}
