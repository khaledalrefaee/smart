<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    // use SoftDeletes;

    protected $guarded = [];

    public function isWarrantyValid()
    {
        $product = Product::find($this->product_id);

        if ($product && $product->warranty_period) {
            $expiryDate = Carbon::parse($this->bought_date);

            // تحديد الوحدة
            if ($product->warranty_unit === 'years') {
                $expiryDate->addYears($product->warranty_period);
            } else {
                $expiryDate->addMonths($product->warranty_period);
            }

            return Carbon::now()->lessThanOrEqualTo($expiryDate);
        }

        return false;
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    
    public function subcatygory()
    {
        return $this->belongsTo(SubCatygory::class,'sub_category_id');
    }


    protected static function boot()
    {
        parent::boot();

        // Handle cascading delete
        static::deleting(function ($customer) {
            // Delete associated images
            $customer->images()->each(function ($image) {
                $image->delete();
            });
        });
    }


    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    

    // public function customerproduct()
    // {
    //     return $this->hasMany(CustomerProduct::class ,'customer_phone');
    // }
}
