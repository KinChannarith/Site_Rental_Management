<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


// if data 'search' posted in POST method, make it safe in HTML then store it in $search. If 'search' data was not posted, fill it with an empty string ('')



class MonthlyPayment extends Model
{
    use HasFactory;
    protected $table="monthlypayments";
    protected $fillable=['siteID',
        'newID','oldID','status','address','fullname','netFee','siteOwner',
        'contact','paymonth','paydate','description','remark','isDeleted','userCreated','lastUserEdited','userDeleted'

    ];

    public function vouchers()
    {
        return $this->hasMany(MonthlyPaymentVoucher::class, 'monthlyPaymentID', 'id');
    }
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
    public static function getMonthlyPayment(){

        $search = (isset($_GET['search'])) ? htmlentities($_GET['search']) : '';
        $filter = (isset($_GET['filter'])) ? htmlentities($_GET['filter']) : '';
        $year = (isset($_GET['year'])) ? htmlentities($_GET['year']) : '';
        $status = (isset($_GET['status'])) ? htmlentities($_GET['status']) : '';
        $sortBy = (isset($_GET['sortBy'])) ? htmlentities($_GET['sortBy']) : '';
        DB::statement(DB::raw('set @rownum=0'));
        $records = DB::table('sites')
        ->select( DB::raw('@rownum  := @rownum  + 1 AS rownum'),'sites.startDate','sites.endDate','sites.noYear','sites.fullname', 'sites.newID','sites.oldID',
            DB::raw("(select '')as Deposite"),
            'sites.netFee','sites.pmtMethod','sites.dueDate',
            DB::raw("(select description from monthlypayments where paymonth='".$year."-01-01"."' and siteID=sites.id LIMIT 1)as Jan"),
            DB::raw("(select description from monthlypayments where paymonth='".$year."-02-01' and siteID=sites.id LIMIT 1)as Feb"),
            DB::raw("(select description from monthlypayments where paymonth='".$year."-03-01' and siteID=sites.id LIMIT 1)as Mar"),
            DB::raw("(select description from monthlypayments where paymonth='".$year."-04-01' and siteID=sites.id LIMIT 1)as Apr"),
            DB::raw("(select description from monthlypayments where paymonth='".$year."-05-01' and siteID=sites.id LIMIT 1)as May"),
            DB::raw("(select description from monthlypayments where paymonth='".$year."-06-01' and siteID=sites.id LIMIT 1)as Jun"),
            DB::raw("(select description from monthlypayments where paymonth='".$year."-07-01' and siteID=sites.id LIMIT 1)as Jul"),
            DB::raw("(select description from monthlypayments where paymonth='".$year."-08-01' and siteID=sites.id LIMIT 1)as Aug"),
            DB::raw("(select description from monthlypayments where paymonth='".$year."-09-01' and siteID=sites.id LIMIT 1)as Sep"),
            DB::raw("(select description from monthlypayments where paymonth='".$year."-10-01' and siteID=sites.id LIMIT 1)as Oct"),
            DB::raw("(select description from monthlypayments where paymonth='".$year."-11-01' and siteID=sites.id LIMIT 1)as Nov"),
            DB::raw("(select description from monthlypayments where paymonth='".$year."-12-01' and siteID=sites.id LIMIT 1) as Decs"),     
            'sites.bankName','sites.bankAccountName','sites.bankAccountNumber',
           
            'sites.netFee','sites.contact','sites.remark','sites.status');
           if($status!="")
           {
            $records=$records->where("status","=",$status);
           
           }
           if($sortBy!="")
           {
            $records=$records->orderBy($sortBy, 'asc');
           
           }
           //if()
           $records=$records->get()->toArray();
          
        
        return $records;
    }
    public static function getMonthlyPaymentReport($newID,$fromYear,$toYear){
        
        
        $monthly =DB::select("
        select DISTINCT mp.newID,Year(mp.payMonth) as Year,
        (select IFNULL(sum(netFee),0) as netFee from monthlypayments where newID=mp.newID and paymonth= CONCAT(Year(mp.payMonth),'-01-01')) as Jan,
        (select IFNULL(sum(netFee),0) as netFee from monthlypayments where newID=mp.newID and paymonth= CONCAT(Year(mp.payMonth),'-02-01')) as Feb,
        (select IFNULL(sum(netFee),0) as netFee from monthlypayments where newID=mp.newID and paymonth= CONCAT(Year(mp.payMonth),'-03-01')) as Mar,
        (select IFNULL(sum(netFee),0) as netFee from monthlypayments where newID=mp.newID and paymonth= CONCAT(Year(mp.payMonth),'-04-01')) as Apr,
        (select IFNULL(sum(netFee),0) as netFee from monthlypayments where newID=mp.newID and paymonth= CONCAT(Year(mp.payMonth),'-05-01')) as May,
        (select IFNULL(sum(netFee),0) as netFee from monthlypayments where newID=mp.newID and paymonth= CONCAT(Year(mp.payMonth),'-06-01')) as Jun,
        (select IFNULL(sum(netFee),0) as netFee from monthlypayments where newID=mp.newID and paymonth= CONCAT(Year(mp.payMonth),'-07-01')) as Jul,
        (select IFNULL(sum(netFee),0) as netFee from monthlypayments where newID=mp.newID and paymonth= CONCAT(Year(mp.payMonth),'-08-01')) as Aug,
        (select IFNULL(sum(netFee),0) as netFee from monthlypayments where newID=mp.newID and paymonth= CONCAT(Year(mp.payMonth),'-09-01')) as Sep,
        (select IFNULL(sum(netFee),0) as netFee from monthlypayments where newID=mp.newID and paymonth= CONCAT(Year(mp.payMonth),'-10-01')) as Oct,
        (select IFNULL(sum(netFee),0) as netFee from monthlypayments where newID=mp.newID and paymonth= CONCAT(Year(mp.payMonth),'-11-01')) as Nov,
        (select IFNULL(sum(netFee),0) as netFee from monthlypayments where newID=mp.newID and paymonth= CONCAT(Year(mp.payMonth),'-12-01')) as Des
        from monthlyPayments mp where mp.newID LIKE '%".$newID."%' and YEAR(mp.payMonth)>='" .$fromYear. "' and YEAR(mp.payMonth)<='".$toYear."'");
        
        return $monthly;
    }
    public static function getPaymentTerm(int $pmtMethod,$payMonth,$siteOwner){
        
        $tmp ="";
        switch($pmtMethod){
            case 1: $tmp="Monthly"; break;
            case 3: $tmp="Quaterly"; break;
            case 6: $tmp="Semesterly"; break;
            case 12: $tmp = "Yearly"; break;
        }
      
        $monthly =DB::select(DB::raw("
        Select '". $tmp ."' as paymentTerm,
        (select count(*)  from monthlyPayments as mp  inner join sites on sites.id=mp.siteID where mp.status='On Air' and mp.payMonth  LIKE '%".$payMonth."%' and  mp.siteOwner  LIKE '%".$siteOwner."%' and mp.siteOwner='%".$siteOwner."%' and sites.pmtMethod='". $tmp ."' ) as allOnAir, 
        (select count(*)  from monthlyPayments as mp inner join sites on sites.id=mp.siteID where mp.status='shut down' and sites.pmtMethod='". $tmp ."' and mp.payMonth  LIKE '%".$payMonth."%'  and  mp.siteOwner  LIKE '%".$siteOwner."%' ) as allShutdown, 
        (select count(*)  from monthlyPayments as mp inner join sites on sites.id=mp.siteID where (mp.status='Under Installation'||mp.status='Under Construction') and sites.pmtMethod='". $tmp ."' and mp.payMonth  LIKE '%".$payMonth."%'  and  mp.siteOwner  LIKE '%".$siteOwner."%' ) as allUnderInstallation, 
        (select count(*)  from monthlyPayments as mp inner join sites on sites.id=mp.siteID where mp.status='Status' and sites.pmtMethod='". $tmp ."' and mp.payMonth  LIKE '%".$payMonth."%' and  mp.siteOwner  LIKE '%".$siteOwner."%' ) as allStatus, 
        (select  IFNULL(sum(mp.netFee),0)  from monthlyPayments as mp inner join sites on sites.id=mp.siteID  where  sites.pmtMethod='". $tmp ."' and mp.payMonth  LIKE '%".$payMonth."%'  and  mp.siteOwner  LIKE '%".$siteOwner."%' ) as netFee ,
        (select  IFNULL(sum(sites.additionalFee),0)  from monthlyPayments as mp inner join sites on sites.id=mp.siteID  where  sites.pmtMethod='". $tmp ."' and mp.payMonth  LIKE '%".$payMonth."%' and  mp.siteOwner  LIKE '%".$siteOwner."%' ) as additionalFee ,
        (select count(*)  from monthlyPayments as mp inner join sites on sites.id=mp.siteID where sites.pmtMethod='". $tmp ."' and mp.payMonth  LIKE '%".$payMonth."%' and  mp.siteOwner  LIKE '%".$siteOwner."%' ) as allSites, 
        (select  (IFNULL(sum(mp.netFee),0)*".$pmtMethod.")  from monthlyPayments as mp inner join sites on sites.id=mp.siteID  where sites.pmtMethod='". $tmp ."' and mp.payMonth  LIKE '%".$payMonth."%' and  mp.siteOwner  LIKE '%".$siteOwner."%' ) as totalAmount
        "));
         
        return $monthly[0];
    }
    public function scopeSearch($query, $newID,$payDateFrom,$payDateTo,$payMonth,$status)
    {
       
        $newID= "%$newID%";
        $status="%$status%";
       
            // echo $term;
            $query->where(function ($query) use ($newID,$payDateFrom,$payDateTo,$payMonth,$status) {
                $query->where('newID','like',$newID);
                $query->where('status','like',$status)->where('isDeleted','=','0');
                if($payMonth!='')
                {
                    $query->where('payMonth','=',$payMonth);
                }
                if($payDateFrom!='')
                {
                    $query->where('payDate','>=',$payDateFrom);
                }
                if($payDateTo!='')
                {
                    $query->where('payDate','<=',$payDateTo);
                }
            }); 
       
        
            
            
            
               
              
        
    }

}
