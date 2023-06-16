<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

enum MOVIES_TYPES :int
{
  case FILM =1;
  case TV_SERIES =2;
}
