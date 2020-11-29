<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'body',
    ];

    protected $appends = ['is_highlighted'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function getIsHighlightedAttribute()
    {
        // to do
        return $this->highlighted === 1;
    }

    public function getIsLikedAttribute()
    {
        return $this->likes->contains('user_id', auth()->id());
    }

}
