<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Helpers extends Model
{
    public static function dateFormat($date,$format)
    {
        $date = new \Carbon\Carbon($date);
        // return $date->format('d/m/Y');
        return $date->format($format);
        // Now modify and return the date
    }
    public static function paymentTerm($st){
        switch($st){
            case "1" : return "Monthly";
                break;
            case "3" : return "Quaterly";
                break;
           case "6": return "Semesterly";
                break;
            case "12": return "Yearly";
                break;
            default : "";
                    break;
        }
    }
    
}
?>