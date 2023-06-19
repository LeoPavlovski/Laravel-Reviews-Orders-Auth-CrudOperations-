<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

enum ROLES :int
{
    //get the 2 types of users
    case PATIENT =2;
    case DOCTOR =1;

}
