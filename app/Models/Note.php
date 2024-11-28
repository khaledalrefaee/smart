<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Note extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }


    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_name');
    }
}
