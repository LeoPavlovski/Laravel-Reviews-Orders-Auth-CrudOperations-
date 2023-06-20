<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

enum REPORTED :int
{
  case YES =1;
  case NO =2;
}
