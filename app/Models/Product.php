<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['locked','colors','ram','warranty','storage'
                            ,'model_id','sell_price','original_price',
                            'desc','display','cameraMp','category','OS','resolution','quantity'];
    
    
    /**
     * Get the productImage that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productImage(): HasMany
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
    /**
     * Get the model that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function models(): HasMany
    {
        return $this->hasMany(Pmodel::class,'model_id', 'id');
    }
}
