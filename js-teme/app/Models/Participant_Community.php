<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant_Community extends Model
{
    use HasFactory;
    protected $table = 'participant_community';
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function community()
    {
        return $this->belongsTo(Genre::class, 'community_id');
    }
}
