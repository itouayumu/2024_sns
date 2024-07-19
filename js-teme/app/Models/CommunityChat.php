<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunityChat extends Model
{
    protected $table = 'community_chat';

    protected $fillable = [
        'user_id',
        'community_id',
        'content',
        'img',
        'delete_flag',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function community()
    {
        return $this->belongsTo(Community::class);
    }
}
