<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscordUser extends Model
{
    public $timestamps=false;
    protected $fillable=['id','name'];
    protected $connection='sqlite';
}
