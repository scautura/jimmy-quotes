<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Storage;
use RestCord\DiscordClient;

Route::get(
    '/welcome', function () {
        return view('welcome');
    }
);

Route::get(
    '/', function () {
        $json=Storage::disk('local')->get("quotes.json");
        $json=json_decode($json, true);

        $server=intval(env('DISCORD_SERVER'));

        $quotes=$json[$server];

        $bot_token=env('DISCORD_BOT_SECRET');

        $discord=new DiscordClient(['token' => $bot_token]);
        $guild=$discord->guild->getGuild(['guild.id' => $server]);

        $users=App\DiscordUser::all();

        foreach($quotes as $quote) {
            if(App\DiscordUser::find(intval($quote["author_id"]))==null) {
                $user=new App\DiscordUser;
                $user->id=intval($quote["author_id"]);
                if(intval($quote["author_id"])!=0) {
                    $user->name=$discord->user->getUser(["user.id" => intval($quote["author_id"])])->username;
                } else {
                    $user->name="";
                }
                $user->save();
            }
/*             if(App\DiscordUser::find(intval($quote["added_by"]))==null) {
                $user=new App\DiscordUser;
                $user->id=intval($quote["added_by"]);
                if(intval($quote["added_by"])!=0) {
                    $user->name=$discord->user->getUser(["user.id" => intval($quote["added_by"])])->username;
                } else {
                    $user->name="";
                }
                $user->save();
            } */
        }

        //dd($discord->user->getUser(['user.id'=>282966166958374913]));

        //dd(App\DiscordUser::find(282966166958374913));

        return view('quotes', ["quotes" => $quotes, "discord" => $discord, "guild" => $guild, "users" => $users]);
    }
);
