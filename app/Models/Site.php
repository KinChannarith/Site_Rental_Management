<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Site extends Model
{
    use HasFactory;
    protected $table="sites";
    protected $rules = [
        'newID' => 'sometimes|required|text|unique:sites'
    ];
    protected $fillable=[
        'newID','oldID','status','contractNumber','siteOwner','additionalFee','additionalService','tenant','RFAIDate','address','initialStatus','fullname',
        'contact','ownerAddress','bankName','bankAccountName',
        'bankAccountNumber','startDate','endDate','noYear','constructionDate',
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
    public static function getPaymentTerm(int $pmtMethod){
        
        $tmp ="";
        switch($pmtMethod){
            case 1: $tmp="Monthly"; break;
            case 3: $tmp="Quaterly"; break;
            case 6: $tmp="Semesterly"; break;
            case 12: $tmp = "Yearly"; break;
        }
      
        $monthly =DB::select(DB::raw("
        Select '". $tmp ."' as paymentTerm,
        (select count(*)  from sites where status='On Air' and pmtMethod='". $tmp ."' ) as allOnAir, 
        (select count(*)  from sites where status='shut down' and pmtMethod='". $tmp ."' ) as allShutdown, 
        (select count(*)  from sites where (status='Under Installation'||status='Under Construction') and pmtMethod='". $tmp ."' ) as allUnderInstallation, 
        (select count(*)  from sites where status='Status' and pmtMethod='". $tmp ."' ) as allStatus, 
        (select  IFNULL(sum(netFee),0)  from sites where  pmtMethod='". $tmp ."' ) as netFee ,
        (select  IFNULL(sum(additionalFee),0)  from sites where  pmtMethod='". $tmp ."' ) as additionalFee ,
        (select count(*)  from sites where pmtMethod='". $tmp ."' ) as allSites, 
        (select  IFNULL(sum(netFee),0)  from sites where pmtMethod='". $tmp ."' ) as totalAmount
        "));
         
        return $monthly[0];
    }
    public static function getMonthly(){
        // $search = (isset($_GET['search'])) ? htmlentities($_GET['search']) : '';
        // $filter = (isset($_GET['filter'])) ? htmlentities($_GET['filter']) : '';
        // $year = (isset($_GET['year'])) ? htmlentities($_GET['year']) : '';
        // $status = (isset($_GET['status'])) ? htmlentities($_GET['status']) : '';
        // $sortBy = (isset($_GET['sortBy'])) ? htmlentities($_GET['sortBy']) : '';
      
        $monthly =DB::select(DB::raw("
        Select 'Monthly' as paymentTerm,
        (select count(*)  from sites where status='On Air' and pmtMethod=1 ) as allOnAir, 
        (select count(*)  from sites where status='shut down' and pmtMethod=1 ) as allShutdown, 
        (select count(*)  from sites where status='Under Installation' and pmtMethod=1 ) as allUnderInstallation, 
        (select count(*)  from sites where status='Status' and pmtMethod=1 ) as allStatus, 
        (select  IFNULL(sum(netFee),0)  from sites where  pmtMethod=1 ) as netFee ,
        (select  IFNULL(sum(additionalFee),0)  from sites where  pmtMethod=1 ) as additionalFee ,
        (select count(*)  from sites where pmtMethod=1 ) as allSites, 
        (select  IFNULL(sum(netFee),0)  from sites where pmtMethod=1 ) as totalAmount
        "));
          
        return $monthly[0];
    }
    public static function getQuaterly(){
        // $search = (isset($_GET['search'])) ? htmlentities($_GET['search']) : '';
        // $filter = (isset($_GET['filter'])) ? htmlentities($_GET['filter']) : '';
        // $year = (isset($_GET['year'])) ? htmlentities($_GET['year']) : '';
        // $status = (isset($_GET['status'])) ? htmlentities($_GET['status']) : '';
        // $sortBy = (isset($_GET['sortBy'])) ? htmlentities($_GET['sortBy']) : '';
      
        $quaterly =DB::select(DB::raw("
        Select 'Quaterly' as paymentTerm,
        (select count(*)  from sites where status='On Air' and pmtMethod=3 ) as allOnAir, 
        (select count(*)  from sites where status='shut down' and pmtMethod=3 ) as allShutdown, 
        (select count(*)  from sites where status='Under Installation' and pmtMethod=3 ) as allUnderInstallation, 
        (select count(*)  from sites where status='Status' and pmtMethod=3 ) as allStatus, 
        (select  IFNULL(sum(netFee),0)  from sites where  pmtMethod=3 ) as netFee ,
        (select  IFNULL(sum(additionalFee),0)  from sites where  pmtMethod=3 ) as additionalFee ,
        (select count(*)  from sites where pmtMethod=3 ) as allSites, 
        (select  IFNULL(sum(netFee)*3,0)  from sites where pmtMethod=3 ) as totalAmount
        "));
          
        return $quaterly[0];
    }
    public static function getYearly(){
        // $search = (isset($_GET['search'])) ? htmlentities($_GET['search']) : '';
        // $filter = (isset($_GET['filter'])) ? htmlentities($_GET['filter']) : '';
        // $year = (isset($_GET['year'])) ? htmlentities($_GET['year']) : '';
        // $status = (isset($_GET['status'])) ? htmlentities($_GET['status']) : '';
        // $sortBy = (isset($_GET['sortBy'])) ? htmlentities($_GET['sortBy']) : '';
      
        $yearly =DB::select(DB::raw("
        Select 'Yearly' as paymentTerm,
        (select count(*)  from sites where status='On Air' and pmtMethod=12 ) as allOnAir, 
        (select count(*)  from sites where status='shut down' and pmtMethod=12 ) as allShutdown, 
        (select count(*)  from sites where status='Under Installation' and pmtMethod=12 ) as allUnderInstallation, 
        (select count(*)  from sites where status='Status' and pmtMethod=12 ) as allStatus, 
        (select IFNULL(sum(netFee),0)  from sites where  pmtMethod=12 ) as netFee ,
        (select IFNULL(sum(additionalFee),0)  from sites where  pmtMethod=12 ) as additionalFee ,
        (select count(*)  from sites where pmtMethod=12 ) as allSites, 
        (select  IFNULL(sum(netFee)*12,0)  from sites where pmtMethod=12 ) as totalAmount
        "));
          
        return $yearly[0];
    }
    public static function getSemesterly(){
        // $search = (isset($_GET['search'])) ? htmlentities($_GET['search']) : '';
        // $filter = (isset($_GET['filter'])) ? htmlentities($_GET['filter']) : '';
        // $year = (isset($_GET['year'])) ? htmlentities($_GET['year']) : '';
        // $status = (isset($_GET['status'])) ? htmlentities($_GET['status']) : '';
        // $sortBy = (isset($_GET['sortBy'])) ? htmlentities($_GET['sortBy']) : '';
      
        $semesterly =DB::select(DB::raw("
        Select 'Semesterly' as paymentTerm,
        (select count(*)  from sites where status='On Air' and pmtMethod=6 ) as allOnAir, 
        (select count(*)  from sites where status='shut down' and pmtMethod=6 ) as allShutdown, 
        (select count(*)  from sites where status='Under Installation' and pmtMethod=6 ) as allUnderInstallation, 
        (select count(*)  from sites where status='Status' and pmtMethod=6 ) as allStatus, 
        (select  IFNULL(sum(netFee),0)  from sites where  pmtMethod=6 ) as netFee ,
        (select  IFNULL(sum(additionalFee),0)  from sites where  pmtMethod=6 ) as additionalFee ,
        (select count(*)  from sites where pmtMethod=6 ) as allSites, 
        (select  IFNULL(sum(netFee)*6,0)  from sites where pmtMethod=6 ) as totalAmount
        "));
        
        return $semesterly[0];
    }
    
  
    public function scopeSearch($query, $term,$oldID,$startDate,$endDate,$pmtMethod,$constructionDate,$netFee,$RFAIDate,$status,$monthlyPayment)
    {
       
        $oldID= "%$oldID%";
        $startDate="%$startDate%";
        $endDate="%$endDate%";
        $pmtMethod = "%$pmtMethod%";
        $constructionDate="%$constructionDate%";
        $netFee="%$netFee%";
        $RFAIDate="%$RFAIDate%";
        $status="%$status%";
        if($monthlyPayment=="1")
        {
            // echo $term;
            $query->where(function ($query) use ($term,$oldID,$startDate,$endDate,$pmtMethod,$constructionDate,$netFee,$RFAIDate,$status,$monthlyPayment) {
                $query->where('newID', $term);
            }); 
        }
        else
        {
        $term = "%$term%";
        $query->where(function ($query) use ($term,$oldID,$startDate,$endDate,$pmtMethod,$constructionDate,$netFee,$RFAIDate,$status) {
            $query->where('newID', 'like', $term)
            ->where('oldID','like',$oldID)
            ->where('startDate','like',$startDate)
            ->where('endDate','like',$endDate)
            ->where('pmtMethod','like',$pmtMethod)
            ->where('netFee','like',$netFee)
            ->where('status','like',$status);
            if($constructionDate!="%%")
                $query->where('constructionDate','like',$constructionDate);
            if($constructionDate!="%%")
                $query->where('RFAIDate','like',$RFAIDate);
            
        });
        }   
            
            
            
               
              
        
    }


}

// public string stringCut(string $st,int $legnth){
//         $string = "Kok koko";
//         return $string;
// }
