<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    const IMAGEABLE_TYPE = "App\Models\Item";

    protected $fillable = ['title', 'body', 'user_id', 'quantity'];

    public function author()
    {
        return $this->belongsTo(User::class);
    }
    public function Images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
