<?php

namespace App\Models;

// use Illuminate\Contracts\auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_SUPER_ADMIN = 'super.admin';

    const ROLE_ADMIN = 'admin';

    const ROLE_EDITOR = 'editor';

    const ROLE_USER = 'user';

    protected $guarded = ['id'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function isSameRole($role): bool
    {
        return $this->role == $role;
    }

    public function isAdmin(): bool
    {
        return $this->isSameRole(self::ROLE_SUPER_ADMIN) || $this->isSameRole(self::ROLE_ADMIN);
    }

    public function getRole(): string
    {
        switch ($this->role) {
            case self::ROLE_SUPER_ADMIN:
                return 'Süper Admin';
            break;
            case self::ROLE_ADMIN:
                return 'Yönetici';
            break;
            case self::ROLE_EDITOR:
                return 'Editör';
            break;
            case self::ROLE_USER:
                return 'Kullanıcı';
            break;
            default:
                return 'Bilinmeyen';
        }
    }
}
