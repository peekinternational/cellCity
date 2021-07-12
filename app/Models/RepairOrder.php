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

     public function user()
		  {
		    return $this->belongsTo(User::class, 'id');
		  }

	 public function repairorderstypes()
      {
        return $this->hasMany(RepairOrderType::class, 'order_Id');
      }

    //   public function model()
		  // {
		  //   return $this->belongsTo(Pmodel::class, 'id');
		  // }
}
