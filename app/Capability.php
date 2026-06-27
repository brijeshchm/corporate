<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Capability extends Authenticatable
{
     protected $connection = 'mysql';
   protected $table = 'web_capabilities';
}
