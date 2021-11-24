<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Http\Resources\MonthlyPaymentResource;
use App\Exports\MonthlyExport;
use App\Exports\MonthlyPaymentsExport;
use App\Models\MonthlyPayment;
use App\Models\Helpers;
use App\Models\Site;
use Illuminate\Support\Collection;
use App\Http\Resources\SiteResource;
use App\Http\Resources\SiteRentalPaymentResource;
use App\Http\Resources\MonthlyPaymentReportResource;
use Illuminate\Pagination\Paginator;
use DB;
use Excel;
use App\Models\MonthlyPaymentVoucher;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class MonthlyPaymentsApiController extends Controller
{
    public function paginate($items, $perPage = 5, $page = null, $options = [])

    {

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);

    }
    public function monthlyPayment()
    {
        $newID= request('SNewID','');
        $payDateFrom = request('SPayDateFrom');
        $payDateTo = request('SPayDateTo');
        $payMonth =request('SPayMonth');
        $status = request('SStatus');
        $paginate = request('paginate');
        if($paginate!="")
        {
            $paginate = (int)$paginate;
            $monthlyPayment = MonthlyPayment::search(trim($newID),trim($payDateFrom),trim($payDateTo),trim($payMonth),trim($status))->paginate($paginate);
         }
        else
            $monthlyPayment = MonthlyPayment::search(trim($newID),trim($payDateFrom),trim($payDateTo),trim($payMonth),trim($status))->get();
          
    
        return MonthlyPaymentResource::collection($monthlyPayment);
    }
    public function update(Request $request, $id)
    {
       

        $post = MonthlyPayment::find($id);
        $post->siteID = $request->siteID;
        $post->newID = $request->newID;
        $post->description = $request->description;
        $post->payMonth = $request->payMonth;
        $post->payDate = $request->payDate;
        $post->netFee = $request->netFee;
        $post->siteOwner = $request->siteOwner;
        $post->lastUserEdited = Auth::user()->name;
       if($request->isDeleted=="delete")
       {
           
        $post->isDeleted=1;
        $post->userDeleted=Auth::user()->name;
        $post->update();
        return response()->json(['message'=>'Delete successfully!'], 200);
       }
        
        
        // $post->vendor_name = $request->vendor_name;
        // $post->vattin = $request->vattin;
        $post->update();
        return response()->json(['message'=>'Updated successfully!'], 200);
    }
   
    public function store(Request $request)
    {      
        
        $post = new MonthlyPayment();
        // $array = json_encode($request,true);
        // echo($request);
        $post->siteID = $request->siteID;
        $post->newID = $request->newID;
        $post->description = $request->description;
        $post->payMonth = $request->payMonth;
        $post->payDate = $request->payDate;
        $post->netFee = $request->netFee;
        $post->siteOwner = $request->siteOwner;
        $post->status = $request->status;
        $post->isDeleted=0;
        $post->userCreated = Auth::user()->name;
        // $arr= $request->vendors;
        //$array = json_decode($request->vendors(0)->content());
        // // $p[] = $request->vendors;
        //echo($array->vattin);
        $post->save();
        //$post = MonthlyPayment::Where('userCreated',Auth::id())->orderByDesc('created_at')->limit(1)->get();
        
        //voucher
       


        
        return response()->json(['message'=>'Saved successfully!'], 200);
    }
    public function destroy($id)
    {
        // $post = MonthlyPayment::find($id);
        // $post->delete();
        DB::statement("Update monthlyPayments set isDeleted=1 where id=".$id );
        
        $voucher = MonthlyPaymentVoucher::where('monthlyPaymentID','=',$id);
        $voucher->delete();
        return response()->json(['message'=>'Deleted successfully!'], 200);
    }
    public function getMonthlyPayment()
    {
        $payMonth = request('SPayMonth','');
        $siteOwner = request('SSiteOwner','');
        
        $monthly = MonthlyPayment::getPaymentTerm(1,$payMonth,$siteOwner);
        $quaterly = MonthlyPayment::getPaymentTerm(3,$payMonth,$siteOwner);
        $semesterly = MonthlyPayment::getPaymentTerm(6,$payMonth,$siteOwner);
        $yearly = MonthlyPayment::getPaymentTerm(12,$payMonth,$siteOwner);
        $report = [$monthly,$quaterly,$semesterly,$yearly];       
        return SiteRentalPaymentResource::collection($report);
    }
    public function getMonthlyPaymentReport()
    {
        $fromYear = request('SFromYear','');
        $toYear = request('SToYear','');
        $newID = request('SNewID','');
        
        $monthlyReport = MonthlyPayment::getMonthlyPaymentReport($newID,$fromYear,$toYear);

        $data = $this->paginate($monthlyReport);


        return MonthlyPaymentReportResource::collection($data);
    }
    public function status()
    {  
        $status = Helpers::getSiteStatus();
        return $status;
    }
    public function siteOwner()
    {  
        $siteOwner = Helpers::getSiteOwner();
        return $siteOwner;
    }

    
       
    
}
