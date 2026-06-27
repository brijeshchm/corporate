<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mobilebanner extends Authenticatable
{
     protected $connection = 'mysql';
   protected $table = 'web_mobilebanner';
}
