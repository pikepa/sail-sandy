<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    public const TYPES = [
        'main' => 'Top Menu',
        'sub' => 'Bottom Menu',
        'pages' => 'Pages',
    ];

    protected $table = 'categories';

    protected $fillable = ['name', 'slug', 'description', 'status', 'type', 'parent_id'];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getDisplayStatusAttribute($status)
    {
        if ($this->status == true) {
            return 'Active';
        } else {
            return 'Inactive';
        }
    }

    public function getDisplayTypeAttribute()
    {
        $types = Category::TYPES;

        return $types[$this->type];
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
        return $this->hasMany(self::class, 'parent_id')
            ->with('categories');
    }
}
