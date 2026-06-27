<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PaymentMode extends Authenticatable
{
     protected $connection = 'mysql';
   protected $table = 'web_paymentmode';
}
