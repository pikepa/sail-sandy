<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
        use HasFactory;
        use HasUuid; 

    protected $fillable= [
        'uuid',
        'bio',
        'user_id'
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(
            related:User::class,
            foreignKey: 'user_id',
        );
    }
}
