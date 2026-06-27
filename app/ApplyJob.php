<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ApplyJob extends Authenticatable
{
     protected $connection = 'mysql';
   protected $table = 'web_applyjob';
}
