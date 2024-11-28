<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SerialNumber extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded =[];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
