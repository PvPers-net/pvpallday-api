<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FillMoreData2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $db = DB::connection('pad_old');

        // Users
        $users = $db->select("SELECT * FROM `pad_old`.`pad_users`");
        $new_users = [];
        foreach ($users as $user) {
            $u = [
                'id' => $user->id,
                'name' => $user->username,
                'email' => $user->email,
                'password' => $user->password,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
                'remember_token' => $user->remember_token
            ];
            $new_users[] = $u;
        }
        \App\User::insert($new_users);
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
