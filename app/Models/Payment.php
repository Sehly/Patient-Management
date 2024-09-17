<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount', 'payment_method', 'discount', 'payment_date', 'patient_id'
    ];							
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

}
