<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

enum STATUS :int
{
    case VISIBLE = 1;
   case PRIVATE = 2;
}
