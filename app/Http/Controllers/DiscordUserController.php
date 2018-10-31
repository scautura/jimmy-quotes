<?php

namespace App\Http\Controllers;

use App\DiscordUser;
use Illuminate\Http\Request;

class DiscordUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DiscordUser::all()->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DiscordUser  $discordUser
     * @return \Illuminate\Http\Response
     */
    public function show($discordUser)
    {
        return DiscordUser::find($discordUser)->toJson();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DiscordUser  $discordUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DiscordUser $discordUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DiscordUser  $discordUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiscordUser $discordUser)
    {
        //
    }
}
