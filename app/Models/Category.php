<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    const STATUSES = [
        '0' => 'Inactive',
        '1' => 'Active',
    ];

    protected $guarded = [];

    use HasFactory;

    public function setCategoryAttribute($value)
    {
        $this->attributes['category'] = ucfirst($value);
    }

    public function getStatusAttribute($status)
    {
        return [
            '0' => 'Inactive',
            '1' => 'Active',
        ][$status] ?? 'Not Stated';
    }


    public function path()
    {
        return "/categories/{$this->id}";
    }
}
