<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'user_id'];

    public function author()
    {
        return $this->belongsTo(User::class);
    }
    public function postImages()
    {
        return $this->hasMany(PostImage::class);
    }
}
