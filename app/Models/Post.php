<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    
    // protected $table = 'post';
    // protected $primaryKey ='post_id';
    protected $fillable = [
        'title', 'body', 'user_id'
    ];
}