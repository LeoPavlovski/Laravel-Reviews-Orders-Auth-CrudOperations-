<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

enum ROLES :int
{
    case ADMIN=1;
    case USER =2;
    case MODERATOR =3;
}
