<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Collection;
use Laravel\Cashier\Billable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * @property int id
 * @property string uuid
 * @property string name
 * @property string email
 * @property string password
 * @property string remember_token
 *
 * @property Planet[]|Collection likedPlanets
 * @property Like[]|Collection likes
 */
class User extends BaseEloquentModel implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract,
    JWTSubject
{
    use Billable, HasUuid, Notifiable, Authenticatable, CanResetPassword, Authorizable;

    protected $fillable = [
        'uuid',
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getJWTIdentifier(): string
    {
        return (string) $this->id;
    }

    public function getJWTCustomClaims(): array
    {
        return [
            'uuid' => $this->uuid,
            'email' => $this->email,
        ];
    }

    public function likedPlanets(): MorphToMany
    {
        return $this->morphedByMany(Planet::class, 'likable', 'likes', 'user_id');
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class, 'user_id');
    }
}
