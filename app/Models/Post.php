<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // protected $table = 'post';
    // protected $primaryKey ='post_id';
    protected $fillable = [
        'title', 'body', 'user_id'
    ];
}