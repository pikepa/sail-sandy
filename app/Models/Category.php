<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    const STATUSES = [
        '0' => 'Inactive',
        '1' => 'Active',
    ];

    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['name', 'slug', 'status','parent_id'];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
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

    /*
    *       Relationships
    */

    public function posts(): HasMany
    {
        return $this->HasMany(Post::class);
    }

    public function subsCategories(): HasMany
    {
        return $this->hasMany(Category::class,'parent_id')
        ->with('categories');
    }
}
