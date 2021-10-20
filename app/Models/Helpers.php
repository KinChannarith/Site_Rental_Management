<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Helpers extends Model
{
    public static function getSiteStatus(){
        $result = array("On Air","shut down","Under Installation","status","Under Construction");
        
        return $result;
    }
    public static function getSiteOwner(){
        $result = array("Smart Axiata","e.co");
        return $result;
    }
    public static function getPaymentTerm(){
        $result = array("Monthly","Quaterly","Semesterly","Yearly");
        return $result;
    }
    public static function dateFormat($date,$format)
    {
        $date = new \Carbon\Carbon($date);
        // return $date->format('d/m/Y');
        return $date->format($format);
        // Now modify and return the date
    }
    public static function stringCut($st,$legnth){
        // if($st.count()=)
        if(strlen($st)>$legnth)
            $st = substr($st,0,$legnth).".....";
        return $st;
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