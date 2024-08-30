<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;
    protected $table = 'community';
    protected $fillable = [
        'community_name',
        'comu_explanation',
        'genre_id',
        'game',
        'icon',
        'reader',
        'public_flag'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'reader');
    }
    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }
    public function messages()
    {
        return $this->hasMany(CommunityChat::class);
    }
    public function participants()
    {
        return $this->hasMany(Participant_Community::class, 'community_id', 'id');
    }
}
