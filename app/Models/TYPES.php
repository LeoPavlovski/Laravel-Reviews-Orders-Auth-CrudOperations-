<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

enum TYPES :int
{
    case CARS =1;
    case TRUCKS =2;
    case MOTORS =3;
}
