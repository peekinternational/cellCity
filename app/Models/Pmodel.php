<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pmodel extends Model
{
    use HasFactory;

  protected $fillable = [
        'brand_Id','model_name',
    ];


    public function brand()
		  {
		    return $this->belongsTo(Brand::class,'brand_Id','id');
		  }

	public function repairTypes()
          {
            return $this->hasMany(RepairType::class,'model_Id');
          }
          public function repairOrder()
		  {
		    return $this->hasMany(RepairOrder::class,'model_Id','id');
		  }
}
