<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * @property int id
 * @property string uuid
 * @property string name
 * @property string email
 * @property string password
 * @property string remember_token
 */
class User extends BaseEloquentModel implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract,
    JWTSubject
{
    use HasUuid, Notifiable, Authenticatable, CanResetPassword, Authorizable;

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
}
