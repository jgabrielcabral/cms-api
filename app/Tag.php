<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * Get the post that owns the tag.
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
