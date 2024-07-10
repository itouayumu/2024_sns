<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;
    protected $table = 'community';

    public function user()
    {
        return $this->belongsTo(User::class, 'reader');
    }
    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }
}
