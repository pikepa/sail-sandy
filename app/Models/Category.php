<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    use HasFactory;

    public function setCategoryAttribute($value)
    {
        $this->attributes['category'] = ucfirst($value);
    }




}
