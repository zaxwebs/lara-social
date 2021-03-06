<?php

namespace App\Models;

use App\Models\Follow;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'username',
        'bio',
        'image',
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
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['full_name', 'is_viewer', 'is_followed', 'following_count', 'follower_count'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getImageAttribute()
    {
        return $this->attributes['image'] ? asset('storage/uploads/profile-images/' . $this->attributes['image']) : asset('images/user.png');
    }

    public function getIsViewerAttribute()
    {
        return $this->id === auth()->user()->id;
    }

    public function getFollowingCountAttribute()
    {
        return $this->follows()->count();
    }

    public function getFollowerCountAttribute()
    {
        return Follow::where('followed_id', $this->id)->count();
    }

    public function getIsFollowedAttribute()
    {
        // to do
        return auth()->user()->follows()->where('followed_id', $this->id)->count() > 0;
    }

    public function posts()
    {
        return $this->hasMany(Post::class)->orderBy('created_at', 'desc');
    }

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'followed_id')->orderBy('follows.created_at', 'desc');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'user_id')->orderBy('follows.created_at', 'desc');
    }
}
