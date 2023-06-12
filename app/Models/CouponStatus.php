<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

enum CouponStatus : int
{
    case ACTIVE=1;
    case INACTIVE=2;
}
