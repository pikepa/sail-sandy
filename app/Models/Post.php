<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $casts = [
        'published_at' => 'date',
    ];

    protected $fillable = [
        'title',
        'cover_image',
        'slug',
        'body',
        'meta_description',
        'published_at',
        'author_id',
        'category_id',
    ];

    protected function PublishedAt(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if ($value !== null) {
                    return Carbon::parse($value)->format('d-m-Y');
                }

                return 'Draft';
            },
            set: function ($value) {
                if ($value == 'Draft' or $value == '') {
                    return null;
                }

                return Carbon::parse($value)->format('Y-m-d  H:m:s');
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

    public function featuredUrl()
    {
        return $this->featured_image
        ? Storage::disk('s3')->url($this->featured_image)
        : '';
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
