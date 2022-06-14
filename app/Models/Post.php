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
        'category_id',
        'uuid'
    ];


    protected function Featured(): Attribute
    {
        return Attribute::make(

            get: function ($value) {

            if($value == 1){ return 'True';} 
                return '';
            },

            set: function ($value) {

            if($value == "True"){ return 1;} 
                return 0;
            }
        );
    }

    protected function PublishedAt(): Attribute
    {
        return Attribute::make(

            get: function ($value) {

            if ($value !== null) { return Carbon::parse($value)->format('M d, Y');}

            return 'Draft';
            },
            set: function ($value) {
                if($value == 'Draft'){ return null;}
                    return now();
            } 
        );
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
