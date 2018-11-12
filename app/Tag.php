<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Post;

class Tag extends Model
{
    use SoftDeletes;

    protected $fillable = ["slug", "title"];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
