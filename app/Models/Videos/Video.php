<?php

namespace App\Models\Videos;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

    protected $htmlReady = FALSE;

    protected $hidden = [
        'submitter_id',
        'owner_id',
        'host_id'
    ];

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

    public function submitter() {
        return $this->belongsTo('App\User', 'submitter_id');
    }

    public function owner() {
        return $this->belongsTo('App\User', 'owner_id');
    }

    public function tags() {
        return $this->belongsToMany('App\Models\Tags\Tag', 'tag_video', 'video_id', 'tag_id');
    }

    public function host() {
        return $this->belongsTo('App\Models\Videos\VideoHost', 'host_id');
    }

    public function nl2br() {
        $this->htmlReady = TRUE;
    }
}
