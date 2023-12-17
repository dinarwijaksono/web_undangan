<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Who_see extends Model
{
    use HasFactory;

    protected $guareded = ['id'];
    public $timestamps = false;
}
