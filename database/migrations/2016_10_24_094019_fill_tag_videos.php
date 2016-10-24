<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FillTagVideos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $db = DB::connection('pad_old');

        // Tags
        $tags = $db->select("SELECT * FROM `pad_old`.`pad_tags`");
        $new_tags = collect([]);
        $duplicates = [];
        foreach ($tags as $tag) {
            $check = $new_tags->where('tag', $tag->name);
            if (!$check->isEmpty()) {
                $duplicates[$tag->id] = $check->first()['id'];
                continue;
            }
            $t = [
                'id' => $tag->id,
                'created_at' => $tag->created_at,
                'updated_at' => $tag->updated_at,
                'tag' => $tag->name
            ];
            echo "Tag: {$tag->id}".PHP_EOL;
            $new_tags->push($t);
        }
        \App\Models\Tags\Tag::insert($new_tags->toArray());

        // Tag Video Relation
        $tags_videos = $db->select("SELECT * FROM `pad_old`.`pad_tag_video`");
        foreach ($tags_videos as $tag_video) {
            try {
                /** @var \App\Models\Videos\Video $video */
                $video = \App\Models\Videos\Video::findOrFail($tag_video->video_id);
                if (array_key_exists($tag_video->tag_id, $duplicates)) {
                    $correct_id = $duplicates[$tag_video->tag_id];
                    $tag = \App\Models\Tags\Tag::findOrFail($correct_id);
                } else {
                    $tag = \App\Models\Tags\Tag::findOrFail($tag_video->tag_id);
                }
                $video->tags()->attach($tag);
                echo "Tag Relation: {$tag_video->tag_id}".PHP_EOL;
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                continue;
            } catch (\Illuminate\Database\QueryException $e) {
                continue;
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
