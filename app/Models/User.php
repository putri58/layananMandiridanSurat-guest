<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'profile_picture',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function scopeSearch(Builder $query, $request, array $searchableColumns): Builder
    {
        if ($request->filled('search')) {
            $keyword = $request->input('search');

            $query->where(function ($q) use ($searchableColumns, $keyword) {
                foreach ($searchableColumns as $column) {
                    $q->orWhere($column, 'LIKE', "%{$keyword}%");
                }
            });
        }

        return $query;
    }

    public function scopeFilter(Builder $query, $request, array $filterableColumns): Builder
    {
        foreach ($filterableColumns as $column) {
            if ($column === 'email_domain' && $request->filled('email_domain')) {
                $domain = $request->input('email_domain');
                $query->where('email', 'LIKE', "%@{$domain}");
            } elseif ($request->filled($column)) {
                $query->where($column, $request->input($column));
            }
        }

        return $query;
    }

    public function getRoleLabelAttribute(): string
    {
        $roles = [
            'Admin'     => 'Admin',
            'Mitra'     => 'Mitra',
            'Pelanggan' => 'Pelanggan',
        ];

        return $roles[$this->role] ?? 'Unknown';
    }

    public function getProfilePictureUrlAttribute(): string
    {
        return $this->profile_picture
            ? asset('storage/' . $this->profile_picture)
            : asset('images/default-avatar.png');
    }
}
