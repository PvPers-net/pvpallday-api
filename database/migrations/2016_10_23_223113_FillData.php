<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class FillData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $db = DB::connection('pad_old');

        // Video Votes
        $votes = $db->select("SELECT `id`, `video_id`, `user_id`, `created_at`, `updated_at`, `vote` FROM `pad_old`.`pad_votes`");
        $new_votes = [];
        foreach($votes as $vote) {
            $v = [
                'id' => $vote->id,
                'created_at' => $vote->created_at,
                'updated_at' => $vote->updated_at,
                'video_id' => $vote->video_id,
                'voter_id' => $vote->user_id,
                'vote' => $vote->vote
            ];
            echo "Video Vote: {$vote->id}".PHP_EOL;
            $new_votes[] = $v;
        }
        \App\Models\Videos\VideoVote::insert($new_votes);

        // Videos
        $videos = $db->select("SELECT * FROM `pad_old`.`pad_videos`");
        $new_videos = [];
        foreach($videos as $video) {
            $v = [
                'id' => $video->id,
                'created_at' => $video->submit_date,
                'updated_at' => $video->updated_at,
                'hosted_at' => $video->original_creation_date,
                'title' => $video->title,
                'description' => $video->description,
                'handle' => $video->clean_name,
                'submitter_id' => $video->submitter_id,
                'owner_id' => $video->owner_id,
                'status_id' => $video->status,
                'host_id' => $video->host_id,
                'unique_host_id' => $video->host_video_id,
                'image_id' => NULL,
                'game_id' => $video->game_id,
                'length' => $video->length
            ];
            echo "Video: {$video->id}".PHP_EOL;
            $new_videos[] = $v;
        }
        \App\Models\Videos\Video::insert($new_videos);

        // Games
        $games = $db->select("SELECT * FROM `pad_old`.`pad_games`");
        $new_games = [];
        foreach ($games as $game) {
            $g = [
                'id' => $game->id,
                'title' => $game->name,
                'handle' => $game->clean_name,
                'hashtag' => $game->hashtag,
                'icon_id' => NULL,
                'logo_id' => NULL,
                'active' => $game->status,
                'created_at' => $game->created_at,
                'updated_at' => $game->updated_at
            ];
            echo "Game: {$game->id}".PHP_EOL;
            $new_games[] = $g;
        }
        \App\Models\Games\Game::insert($new_games);

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
                    $video->tags()->attach($correct_id);
                } else {
                    $tag = \App\Models\Tags\Tag::findOrFail($tag_video->tag_id);
                    $video->tags()->attach($tag_video->tag_id);
                }
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
