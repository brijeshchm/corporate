<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Certificate extends Authenticatable
{
     protected $connection = 'mysql';
   protected $table = 'web_certificate';
}
