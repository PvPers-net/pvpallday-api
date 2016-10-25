<?php

namespace App\Models\Tags;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $hidden = [
        'pivot'
    ];

    public function videos() {
        return $this->belongsToMany('App\Models\Videos\Video', 'tag_video', 'tag_id', 'video_id');
    }
}
