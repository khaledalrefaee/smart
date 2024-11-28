<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded =[];
    

    public function category()
    {
        return $this->belongsTo(Category::class,'catgory_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCatygory::class,'sub_catgory_id');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }


    public function product()
    {
        return $this->belongsTo(Product::class,'sub_product_id');
    }


    public function products()
    {
        return $this->hasMany(Product::class,'sub_product_id');
    }

    public function customer()
    {
        return $this->hasMany(Customer::class,'product_id');
    }
    public function serialNumbers()
    {
        return $this->hasMany(SerialNumber::class,'product_id');
    }

    public function note()
    {
        return $this->hasMany(Note::class,'product_id');
    }

    protected static function boot()
    {
        parent::boot();

        // Handle cascading delete
        static::deleting(function ($product) {
            // Delete associated images
            $product->images()->each(function ($image) {
                $image->delete();
            });

            // Delete child products
            $product->products()->each(function ($childProduct) {
                $childProduct->delete();
            });

            $product->customer()->each(function ($customer) {
                $customer->delete();
            });

            $product->serialNumbers()->each(function ($serialNumbers) {
                $serialNumbers->delete();
            });

            $product->note()->each(function ($note) {
                $note->delete();
            });
        });
    }
}
