<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTime extends Model
{
    use HasFactory;

    protected $fillable = ['time'];

    public  function repairOrder()
    {
        return $this->belongsTo(RepairOrder::class,'orderTime_id','id');
    }
}
