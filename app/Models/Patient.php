<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable=['Name','Date','Phone','Payment','Recommended','Total_Session' , 'Session_Number','Total_Amount','Discount' ,'Total_Payment'];


    public function updateTotalPayment($newAmount)
    {
        $this->Total_Payment += $newAmount;
        $this->save();
    }

    
    public function calculateFinalAmount($amount, $discount)
    {
        $discountAmount = $discount ? ($amount * ($discount / 100)) : 0;
        return $amount - $discountAmount;
    }

        public function payments()
    {
        return $this->hasMany(Payment::class);
    }

}
