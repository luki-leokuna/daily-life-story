<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoryTag extends Model
{
    protected $fillable = ['story_id', 'tag'];

    public function story()
    {
        return $this->belongsTo(Story::class);
    }
}