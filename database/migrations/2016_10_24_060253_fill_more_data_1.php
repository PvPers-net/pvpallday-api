<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FillMoreData1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $db = DB::connection('pad_old');

        // Video Statuses
        $video_statuses = $db->select("SELECT * FROM `pad_old`.`pad_video_statuses`");
        $new_video_statuses = [];
        foreach ($video_statuses as $video_status) {
            $s = [
                'id' => $video_status->id,
                'created_at' => $video_status->created_at,
                'updated_at' => $video_status->updated_at,
                'title' => $video_status->name,
                'description' => $video_status->description
            ];
            $new_video_statuses[] = $s;
        }
        \App\Models\Videos\VideoStatus::insert($new_video_statuses);

        // Video Hosts
        $video_hosts = $db->select("SELECT * FROM `pad_old`.`pad_video_hosts`");
        $new_video_hosts = [];
        foreach ($video_hosts as $video_host) {
            $h = [
                'id' => $video_host->id,
                'created_at' => $video_host->created_at,
                'updated_at' => $video_host->updated_at,
                'title' => $video_host->name,
                'handle' => $video_host->clean_name,
                'url' => $video_host->url,
                'fa-icon' => $video_host->icon
            ];
            $new_video_hosts[] = $h;
        }
        \App\Models\Videos\VideoHost::insert($new_video_hosts);

        // Stream Services
        $services = $db->select("SELECT * FROM `pad_old`.`pad_stream_services`");
        $new_services = [];
        foreach ($services as $service) {
            $s = [
                'id' => $service->id,
                'created_at' => $service->created_at,
                'updated_at' => $service->updated_at,
                'handle' => $service->clean_name,
                'title' => $service->name
            ];
            $new_services[] = $s;
        }
        \App\Models\Streams\StreamService::insert($new_services);
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
