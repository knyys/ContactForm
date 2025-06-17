<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 
        'last_name', 
        'gender',
        'email', 
        'tel', 
        'address', 
        'detail', 
    ];
    
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
