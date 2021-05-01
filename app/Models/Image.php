<?php

namespace App\Models;

use App\Models\post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'post_image_path', 'post_image_caption'];

    public function imageable()
    {
        return $this->morphTo();
    }
}
