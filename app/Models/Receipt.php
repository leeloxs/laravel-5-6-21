<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiptController extends Model
{
    use HasFactory;
    public $fillable = [
        'name', 'email', 'amount', 
    ];
}
