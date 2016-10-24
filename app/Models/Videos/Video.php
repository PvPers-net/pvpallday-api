<?php

namespace App\Models\Videos;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

    protected $htmlReady = FALSE;

    public function getRouteKeyName() {
        return 'handle';
    }

    public function getDescriptionAttribute($description) {
        if ($this->htmlReady) {
            return nl2br($description);
        } else {
            return $description;
        }
    }

    public function tags() {
        return $this->belongsToMany('App\Models\Tags\Tag', 'tag_video', 'video_id', 'tag_id');
    }

    public function nl2br() {
        $this->htmlReady = TRUE;
    }
}
