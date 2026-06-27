<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CourseCurriculumExcel extends Authenticatable
{
   protected $connection = 'mysql';
   protected $table = 'web_coursecurriculumexcel';
}
