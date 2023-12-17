<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_demo extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $timestamps = false;
}
