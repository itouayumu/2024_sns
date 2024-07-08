<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $table = 'genre';

    protected $fillable = [
        'name',
        'delete_flag',
    ];

    public function userInformation()
    {
        return $this->hasMany(UserInformation::class);
    }
}
