<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
   public function scopeSearch(Builder $query, $request, array $searchableColumns): Builder
{
    if ($request->filled('search')) {
        $keyword = $request->input('search');

        $query->where(function ($q) use ($searchableColumns, $keyword) {
            foreach ($searchableColumns as $column) {
                $q->orWhere($column, 'LIKE', "%$keyword%");
            }
        });
    }

    return $query;
}
public function scopeFilter(Builder $query, $request, array $filterableColumns): Builder
{
    foreach ($filterableColumns as $column) {

        // Khusus filter domain email
        if ($column === 'email_domain' && $request->filled('email_domain')) {
            $domain = $request->input('email_domain');
            $query->where('email', 'LIKE', "%@$domain");
        }

        // Kalau ada filter lain
        elseif ($request->filled($column)) {
            $query->where($column, $request->input($column));
        }
    }

    return $query;
}



    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
