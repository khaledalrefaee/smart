<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subcatgory()
    {
        return $this->hasMany(SubCatygory::class ,'catgory_id');
    }

    public function product()
    {
        return $this->hasMany(Product::class ,'catgory_id');
    }

    // public function customer()
    // {
    //     return $this->hasMany(Customer::class ,'category_id');
    // }


    protected static function boot()
    {
        parent::boot();

        // Handle cascading delete
        static::deleting(function ($category) {
            // Delete related subcategories
            $category->subcatgory()->each(function ($subCategory) {
                $subCategory->delete();
            });

            // Delete related products
            $category->product()->each(function ($product) {
                $product->delete();
            });

            // // Delete related customers
            // $category->customer()->each(function ($customer) {
            //     $customer->delete();
            // });
        });
    }
}
