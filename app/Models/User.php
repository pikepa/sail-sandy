<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Link;
use App\Models\Post;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use HasApiTokens;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
    *       Relationships
    */

    public function profile(): HasOne
    {
        return $this->hasOne(
            related: Profile::class,
            foreignKey: 'user_id',
        );
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'author_id');
    }
    
    public function links(): HasMany
    {
        return $this->hasMany(Link::class, 'owner_id');
    }
}
