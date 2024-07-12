<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant_Community extends Model
{
    use HasFactory;
    protected $table = 'participant_community';
    protected $fillable = [
        'community_id',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function community()
    {
        return $this->belongsTo(Community::class, 'community_id');
    }
}
