<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $table="vendors";
  
    protected $fillable=[
        'vendor_name','vattin','userCreated'

    ];
    public function scopeSearch($query,$vendorName, $vattin)
    {
        //dd($vattin);
        $vendor_name = "%$vendorName%";
        $vattin= "%$vattin%";
        
        
        $query->where(function ($query) use ($vendor_name,$vattin) {
            $query->where('vendor_name', 'like', $vendor_name)
            ->where('vattin','like',$vattin);
            
            
            
            
               
              
        });
    }
}
