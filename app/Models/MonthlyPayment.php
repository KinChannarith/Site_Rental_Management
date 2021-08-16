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
        'newID','oldID','status','address','fullname','netFee',
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

}
