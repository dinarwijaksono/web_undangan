<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Who_see_demo extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function Products()
    {
        return $this->belongsTo(Product::class);
    }
}
