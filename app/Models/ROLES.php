<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

enum ROLES :int
{
    case Admin =1;
    case User=2;
    case Moderator=3;
}
