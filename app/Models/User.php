<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * Get the comments for the blog post.
     */
    protected static function boot() { 
        parent::boot();

        // static::updated(function ($user) {
        //     $user->update(['expires' => Carbon::now()->addYear()->toDateTimeString()])
        // });
    
        // static::created(function ($thread) {
        //     $user->update(['expires' => Carbon::now()->addYear()->toDateTimeString()])
        // });
    }
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function subscribers()
    {
        return $this->belongsToMany('App\User', 'subscriptions', 'user_id',     
        'subscriber_id')->withTimestamps();
    }
    public function subscription()
    {
        return $this->belongsToMany('App\User', 'subscriptions', 'subscriber_id', 
        'user_id')->withTimestamps();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'firstName',
        'lastName',
        'phone',
        'brithDate',
        'image',
        'subscription_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
