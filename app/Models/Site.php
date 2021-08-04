<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;
    protected $table="sites";
    protected $fillable=[
        'newID','oldID','status','address','initialStatus','fullname',
        'contact','ownerAddress','bankName','bankAccountName',
        'bankAccountNumber','startDate','endDate','noYear',
        'netFee','pmtMethod','dueDate','remark','isDeleted','userCreated','lastUserEdited','userDeleted'

    ];
    public function dateFormat($date,$format)
    {
        $date = new \Carbon\Carbon($date);
        // return $date->format('d/m/Y');
        return $date->format($format);
        // Now modify and return the date
    }
    public function stringCut($st,$legnth){
                // if($st.count()=)
                if(strlen($st)>$legnth)
                    $st = substr($st,0,$legnth).".....";
                return $st;
        }
    

}

// public string stringCut(string $st,int $legnth){
//         $string = "Kok koko";
//         return $string;
// }
