<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Get the tags for the post.
     */
    public function tags()
    {
        return $this->hasMany('App\Tag');
    }
}
