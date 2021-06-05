<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    public $timestamps=true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    public $fillable = [
        'fname', 'lname', 'address1', 'address2', 'city', 'state', 'phone' , 'alternatephone'
    ];
}