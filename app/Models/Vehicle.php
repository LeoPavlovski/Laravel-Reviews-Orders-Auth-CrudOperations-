<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
//        $table->string('registration');
//            $table->date('date_of_production');
//            $table->integer('consumption');
//            $table->string('manufacturer');
//            $table->float('price_for_day');

    protected $fillable= [
        'brand_id',
        'company_id',
        'type_id',
        'user_id',
        'registration',
        'date_of_production',
        'manufacturer',
        'price_for_day',
        'consumption'
    ];
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function type(){
        return $this->belongsTo(Type::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
