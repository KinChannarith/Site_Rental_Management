<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Http\Resources\SiteResource;
use App\Http\Resources\SiteRentalPaymentResource;
use App\Exports\MonthlyExport;
use App\Exports\SitesExport;
use App\Models\Site;
use DB;
use Excel;
use Illuminate\Support\Facades\Auth;
class SiteRentalPaymentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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

            
        if($paginate!="")
        {
            $paginate = (int)$paginate;
            $sites = Site::search(trim($newID),trim($oldID),trim($startDate),trim($endDate),trim($pmtMethod),trim($constructionDate),trim($netFee),trim($RFAIDate),trim($status))->paginate($paginate);
         }
        else
            $sites = Site::search(trim($newID),trim($oldID),trim($startDate),trim($endDate),trim($pmtMethod),trim($constructionDate),trim($netFee),trim($RFAIDate),trim($status))->get();
          
   
        return SiteResource::collection($sites);
    }
    
    public function detail(Request $request)
    {   
        // $sites = Site::paginate(5);
        // //return SiteReource::collection($sites);
        // return SiteResource::collection($sites);
        return view('site-rental-payment/detail');
        // $search = $request->input('search');
        // $filter = $request->input('filter');
        // $startDateFrom = $request->input('startDateFrom');
        // $endDateFrom = $request->input('endDateFrom');
        // $startDateTo = $request->input('startDateTo');
        // $endDateTo = $request->input('endDateTo'f);
        // $status = $request->input('status');
        //     if($startDateFrom!=null && $startDateTo!=null)
        //     {
        //         $sites=Site::whereBetween('startDate',[$startDateFrom,$startDateTo])->where('isDeleted','=',0)->orderByDesc('created_at');
                
        //     }
        //     else
        //     {
        //         $sites=Site::where('isDeleted','=',0)->orderByDesc('created_at');
        //     }
       
        //     if($endDateFrom!=null && $endDateTo!=null)
        //     {
        //         $sites=$sites->whereBetween('endDate',[$endDateFrom,$endDateTo])->where('isDeleted','=',0)->orderByDesc('created_at');
        //     }
        //     else
        //         $sites=$sites->where('isDeleted','=',0)->orderByDesc('created_at');
           
        // if($status!=null)
        //     $sites = $sites->where('status',"=",$status)->orderByDesc('created_at');
        // switch($filter)
        // {
        //     case "NewID": 
        //          $sites = $sites->where('newID','LIKE','%'.$search.'%')->orderByDesc('created_at') ->paginate(5);
        //         //$sites = Site::where('newID','LIKE','%'.$search.'%');
        //         //$sites=Site::whereBetween('startDate',[$startDate,$endDate])->where('newID','LIKE','%'.$search.'%')->paginate(5);
             
        //         return view('site-rental/list',compact('sites'));
                
        //     break;
        //     case "OwnerName": 
        //         $sites = $sites->where('fullname','LIKE','%'.$search.'%')->orderByDesc('created_at')->paginate(5);
        //         return view('site-rental/list',compact('sites'));
        //     break;
        //     default:
        //         $sites = $sites->paginate(5);
        //         return view('site-rental-payment/detail',compact('sites'));
          
                  
        //}
        
    }
    public function index(Request $request)
    {
        
        $monthly = Site::getPaymentTerm(1);
        $quaterly = Site::getPaymentTerm(3);
        $semesterly = Site::getPaymentTerm(6);
        $yearly = Site::getPaymentTerm(12);
        $report = [$monthly,$quaterly,$semesterly,$yearly];
       
        // return view('site-rental/list');
        //$sites = Site::paginate(5);
        //dd($monthly);
         return view('site-rental-payment/list',compact('monthly','quaterly','semesterly','yearly'));
    }
    public function getMonthlyPayment()
    {
        
        $monthly = Site::getPaymentTerm(1);
        $quaterly = Site::getPaymentTerm(3);
        $semesterly = Site::getPaymentTerm(6);
        $yearly = Site::getPaymentTerm(12);
        $report = [$monthly,$quaterly,$semesterly,$yearly];       
        // return view('site-rental/list');
        //$sites = Site::paginate(5);
        //dd($monthly);
        return SiteRentalPaymentResource::collection($report);
    }
    public function create()
    {
        return view('site-rental/create');
    }
    public function store(Request $request)
    {
       $request->validate([
           'newID'=>['required','unique:sites'],
           'status'=>'required',
           'address'=>'required',
           'fullname'=>'required',
            'contact'=>'required',
            'ownerAddress'=>'required',
            'startDate'=>'required',
            'endDate'=>'required',
            'noYear'=>'required',
            'netFee'=>'required',
            'pmtMethod'=>'required',
            'dueDate'=>'required'

       ]);
            $request->userCreated = Auth::id();
            // dd($request->userCreated)

           Site::create($request->all());

        return redirect()->route('site-rental.Index')
        ->with('success','Site added successfully!');
      
    
    }


    public function destroy($id)
    {
         DB::delete('delete from sites where id = ?',[$id]);
  
        return redirect()->route('site-rental.Index')
                        ->with('success','Sites deleted successfully');
      
    }
    public function edit($id)
    {
        $site = Site::find($id);
        $site->startDate = $site->dateFormat($site->startDate,'Y-m-d');
        $site->endDate = $site->dateFormat($site->endDate,'Y-m-d');
        $site->RFAIDate = $site->dateFormat($site->RFAIDate,'Y-m-d');
        $site->constructionDate = $site->dateFormat($site->constructionDate,'Y-m-d');
        // $site->startDate = date('d-m-Y', strtotime($site->startDate));
       // return 
    //    $site->startDate = date("17-02-2021");
         return view('site-rental/edit',compact('site'));
       // dd($site->startDate);
        // $sites = Site::paginate(2);
        // return view('site-rental/list',['sites'=>$sites]);
    }
    public function delete($id)
    {
        DB::update('Update sites set isDeleted=1, userDeleted='.Auth::user()->id.' where id = ?',[$id]);
  
        return redirect()->route('site-rental.Index')
                        ->with('success','Sites deleted successfully');
        
    }
    public function update(Request $req)
    {
        
        $sites=Site::where('newID',$req->newID);
        // $rules = Site::$rules;
        // $rules['newID'] = $rules['newID'] . ',id,' . $id;
        // $validationCertificate  = Validator::make($input, $rules); 
        $sitesID=Site::where('newID',$req->newID)->where('id',$req->id);
        if(($sites->count()>0 && $sitesID->count()>0)||$sites->count()==0)
        { 
                $req->validate([
                'newID'=>['required'],
                'status'=>'required',
                'address'=>'required',
                'fullname'=>'required',
                'contact'=>'required',
                'ownerAddress'=>'required',
                'startDate'=>'required',
                'endDate'=>'required',
                'noYear'=>'required',
                'netFee'=>'required',
                'pmtMethod'=>'required',
                'dueDate'=>'required'

            ]);

            $data = Site::find($req->id);
            $data->newID = $req->newID;
            $data->oldID = $req->oldID;
            $data->status = $req->status;
            $data->address = $req->address;
            $data->initialStatus = $req->initialStatus;
            $data->fullname = $req->fullname;
            $data->contact = $req->contact;
            $data->ownerAddress = $req->ownerAddress;
            $data->bankName = $req->bankName;
            $data->bankAccountName = $req->bankAccountName;
            $data->bankAccountNumber = $req->bankAccountNumber;
            $data->startDate = $req->startDate;
            $data->endDate = $req->endDate;
            $data->noYear = $req->noYear;
            $data->netFee = $req->netFee;
            $data->pmtMethod = $req->pmtMethod;
            $data->dueDate = $req->dueDate;
            $data->remark = $req->remark;
            $data->siteOwner = $req->siteOwner;
            $data->constructionDate = $req->constructionDate;
            $data->RFAIDate = $req->RFAIDate;
            $data->additionalFee = $req->additionalFee;
            $data->tenant = $req->tenant;
            $data->contractNumber = $req->contractNumber;
            $data->lastUserEdited = Auth::user()->id;
           
             $data->save();
             return redirect()->route('site-rental.Index')
             ->with('success','Site updated successfully!');
            
        }
        elseif($sites->count()>0 && $sitesID->count()==0)
        {
            return redirect()->route('site-rental.Edit',$req->id)
            ->with('message',"New Site ID must be unique.");
        }

        
        
    }
    public function view($id)
    {
        $site = Site::find($id);
        //return $address;
        $site->startDate = $site->dateFormat($site->startDate,'Y-m-d');
        $site->endDate = $site->dateFormat($site->endDate,'Y-m-d');
        return view('site-rental/view',compact('site'));
    }
    public function search(){
        $search = $_GET['search'];
        $filter = $_GET['filter'];
        // $startDate = $_GET['startDate'];
        // $endDate = $_GET['endDate'];
        // dd($startDate);
        // dd($endDate);
        
        switch($filter)
        {
            case "NewID": 
                 $sites = Site::where('newID','LIKE','%'.$search.'%') ->paginate(5);
                //$sites = Site::where('newID','LIKE','%'.$search.'%');
                //$sites=Site::whereBetween('startDate',[$startDate,$endDate])->where('newID','LIKE','%'.$search.'%')->paginate(5);
                return view('site-rental/list',['sites'=>$sites]);
            break;
            case "OwnerName": 
                $sites = Site::where('fullname','LIKE','%'.$search.'%')->paginate(5);
                return view('site-rental/list',['sites'=>$sites]);
            break;
            default:
            $sites = Site::paginate(5);
             return view('site-rental/list',['sites'=>$sites]);
           
                  
        }
       
    }
}
