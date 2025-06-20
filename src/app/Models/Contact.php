<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

     protected $fillable = [
        'category_id',
        'name',
        'first_name',
        'last_name',
        'gender',
        'email',
        'address',
        'building',
        'detail',
        'tel', 
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


}
