<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

enum PREMIERS_TYPES :int
{
    case TwoD=1;
    case ThreeD=2;

}
