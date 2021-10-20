<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyPaymentVoucher extends Model
{
    use HasFactory;
    protected $table="monthlyPaymentVouchers";
  
    protected $fillable=[
        'vendor_name','vattin','monthlyPaymentID','voucher'

    ];
}
