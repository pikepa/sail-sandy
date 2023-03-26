<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Link extends Model
{
    use HasFactory;

    protected $table = 'links';

    protected $casts = [
        'published_at' => 'date',
    ];

    protected $fillable = [
        'title',
        'url',
        'owner_id',
        'position',
        'sort',
        'status'
    ];

    public function owner(): BelongsTo
    {

        return $this->belongsTo(
            related: User::class,
            foreignKey: 'owner_id',
        );
    }

}
