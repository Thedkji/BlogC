<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'user_name',
        'pass',
        'name',
        'avatar',
        'bio',
        'date_of_birth',
        'email',
        'phone',
        'role'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
