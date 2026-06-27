<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
     protected $connection = 'mysql';
   protected $table = 'web_clients';
}
