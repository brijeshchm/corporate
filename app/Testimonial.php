<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Testimonial extends Authenticatable
{
     protected $connection = 'mysql';
   protected $table = 'web_testimonials';
}
