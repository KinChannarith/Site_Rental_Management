<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Http\Resources\SiteResource;
use App\Http\Resources\StatusResource;
use App\Exports\MonthlyExport;
use App\Exports\SitesExport;
use App\Models\Site;
use App\Models\Helpers;
use DB;
use Excel;
use Illuminate\Support\Facades\Auth;
class SiteRentalPaymentsApiController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    //Api
    public function export($sites)
    {
        $sitesArray = explode(',',$sites);
        //dd($sitesArray);
        return (new SitesExport($sitesArray))->download('sites.xlsx');
        //return Excel::download(new SitesExport,'MonthlyPayment.xlsx');
    }
    public function allSites()
    {
        return Site::pluck('id');
    }

    public function site()
    {
        $newID= request('SNewID','');
        $oldID= request('SOldID','');
        $startDate= request('SStartDate','');
        $endDate= request('SEndDate','');
        $pmtMethod =request('SPaymentTerm','');
        $constructionDate = request('SConstructionDate','');
        $netFee = request('SNetFee','');
        $RFAIDate = request('SRFAIDate','');
        $status = request('SStatus');
        $paginate = request('paginate');
        $monthlyPayment =request('monthlyPayment');
        
        
        if($paginate!="")
        {
            $paginate = (int)$paginate;
            $sites = Site::search(trim($newID),trim($oldID),trim($startDate),trim($endDate),trim($pmtMethod),trim($constructionDate),trim($netFee),trim($RFAIDate),trim($status),trim($monthlyPayment))->paginate($paginate);
         }
        else
            $sites = Site::search(trim($newID),trim($oldID),trim($startDate),trim($endDate),trim($pmtMethod),trim($constructionDate),trim($netFee),trim($RFAIDate),trim($status),trim($monthlyPayment))->get();
          
        
        return SiteResource::collection($sites);
    }
    public function status()
    {  
        $status = Helpers::getSiteStatus();
        return $status;
    }
    
    
    
    
       
    
}
