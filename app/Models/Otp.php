<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Otp extends Model
{
    use HasFactory;
    protected $guarded = []; 

    public function generateCode(){
        $this->timestamps = false;  
        $this->code = rand(1000, 9999); 
        $this->expires_at = now()->addMinute(15);  
        $this->save();
    }
}
