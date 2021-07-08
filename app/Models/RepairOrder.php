<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'model_Id','date','time','name','address','phone','email','instructions'
    ];

 //    public function brand()
	// 	  {
	// 	    return $this->belongsTo(Brand::class, 'id');
	// 	  }

	// public function repairTypes()
 //          {
 //            return $this->hasMany(RepairType::class, 'model_Id');
 //          }
}
