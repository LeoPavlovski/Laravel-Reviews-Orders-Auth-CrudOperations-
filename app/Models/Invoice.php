<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'number_of_invoice',
        'price',
        'date_of_issue',
        'vehicle_id',
        'company_id',
    ];
    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }
    public function company(){
        return $this->belongsTo(Company::class);
    }
}
