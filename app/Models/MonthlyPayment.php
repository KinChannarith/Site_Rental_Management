<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyPayment extends Model
{
    use HasFactory;
    protected $table="monthlypayments";
    protected $fillable=[
        'newID','oldID','status','address','fullname',
        'contact','paymonth','paydate','description','remark','isDeleted','userCreated','lastUserEdited','userDeleted'

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
