<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCatygory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class,'catgory_id');
    }
    public function product()
    {
        return $this->hasMany(Product::class ,'sub_catgory_id');
    }

    // public function customer()
    // {
    //     return $this->hasMany(Customer::class ,'sub_category_id');
    // }

    protected static function boot()
    {
        parent::boot();

        // Handle cascading delete
        static::deleting(function ($subCategory) {
            // Delete related products
            $subCategory->product()->each(function ($product) {
                $product->delete();
            });

            // // Delete related customers
            // $subCategory->customer()->each(function ($customer) {
            //     $customer->delete();
            // });
        });
    }
}
