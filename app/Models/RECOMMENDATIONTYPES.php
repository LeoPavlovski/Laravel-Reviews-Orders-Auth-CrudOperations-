<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

enum RECOMMENDATIONTYPES : int
{
    case  ACTOR =1;
    case MOVIE =2;

}
