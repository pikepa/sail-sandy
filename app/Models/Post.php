<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'cover_image',
        'slug',
        'body',
        'meta_description',
        'published_at',
        'featured',
        'author_id',
        'category_id'
    ];


    public function getFeaturedAttribute($value)
    {
        if($value == 1)
        {
            return 'True';
        } 
        else{
            return '';
        }    
    
    }
    public function getPublishedAtAttribute($value)
    {
        if ($value = null)
        {
            return 'Draft';
        } 
        else{
            return Carbon::parse($value)->format('M d, Y');
        }    
    }

    public function scopePublished($query)
    {
     
        return $query->where('published_at', 'ne', null);
     
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    /*
    *       Relationships
    */

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->BelongsTo(Category::class);
    }

    public function tags(): HasMany
    {
        return $this->HasMany(Tag::class, 'post_tag');
    }

}
