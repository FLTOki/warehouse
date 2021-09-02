<?php

namespace App\Models;

use App\Mail\NewUserWelcomeMail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Searchable;

    const SEARCHABLE_FIELDS = ['id', 'name'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function($user) {

            $user->profile()->create([
                
             ]);

            Mail::to($user->email)->send(new NewUserWelcomeMail());

        });
    }

    public function toSearchableArray()
    {
        return $this->only(self::SEARCHABLE_FIELDS);
    }

    public function isAdmin()
    {
        return $this->role == 'admin';
    }

    public function isOwner()
    {
        # code...
        return $this->role == 'owner';
    }

    public function roles()
    {
        # code...
        return $this->belongsToMany(Role::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function posts()
    {
        # code...
        return $this->hasMany(Post::class)->orderBy('created_at', 'DESC');
    }

    // public function hasAnyRoles(Role $roles)
    // {
    //     return $this->roles();
    // }

    // public function hasRole(Role $role)
    // {
    //     return $this->roles();
    // }
}
