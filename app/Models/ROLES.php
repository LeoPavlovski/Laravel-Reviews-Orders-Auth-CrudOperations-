<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

enum ROLES :int
{
    case USER=1;
    case AUTHOR=2;
}
