<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;
use App\Models\MonthlyPayment;
use App\Exports\MonthlyExport;
use App\Exports\MonthlyPaymentsExport;
use Illuminate\Support\Facades\Auth;
use DB;
use Excel;
class MonthlyPaymentsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
        return view('monthly-payment/create');
    }
    public function readData(Request $req)
    {    $id = $req->input('id');
        
        // $sites = Site::where('newID','=',$search) ->get();
        $sites = Site::where('newID','=',$id) ->get();
        return response($sites);
    }
    public function index(Request $request)
    {
        //return dd(MonthlyPayment::paginate(5));
        $search = $request->input('search');
        $filter = $request->input('filter');
        $payDateFrom = $request->input('startDateFrom');
        $payMonth = $request->input('payMonth');
        $payDateTo = $request->input('startDateTo');
        $endDateTo = $request->input('endDateTo');
        $status = $request->input('status');
            if($payDateFrom!=null && $payDateTo!=null)
            {
                $monthlyPayments=MonthlyPayment::whereBetween('payDate',[$payDateFrom,$payDateTo])->where('isDeleted','=',0)->orderByDesc('created_at');
                
            }
            else
            {
                $monthlyPayments=MonthlyPayment::where('isDeleted','=',0)->orderByDesc('created_at');
            }
       
            if($payMonth!=null)
            {
                $firstPayMonth = date("Y",strtotime($payMonth))."-".date("m",strtotime($payMonth))."-01";

                //dd($firstPayMonth);
                 $monthlyPayments=$monthlyPayments->where('paymonth',$firstPayMonth)->where('isDeleted','=',0)->orderByDesc('created_at');
                
            }
            else
                $monthlyPayments=$monthlyPayments->where('isDeleted','=',0)->orderByDesc('created_at');
           
        if($status!=null)
            $monthlyPayments = $monthlyPayments->where('status',"=",$status)->orderByDesc('created_at');
        // switch($filter)
        // {
        //     case "NewID": 
        //          $monthlyPayments = $monthlyPayments->where('newID','LIKE','%'.$search.'%')->orderByDesc('created_at') ->paginate(5);
        //         //$sites = Site::where('newID','LIKE','%'.$search.'%');
        //         //$sites=Site::whereBetween('startDate',[$startDate,$endDate])->where('newID','LIKE','%'.$search.'%')->paginate(5);
             
        //         return view('monthly-payment/list',compact('monthlyPayments'));
                
        //     break;
        //     case "OwnerName": 
        //         $monthlyPayments = $monthlyPayments->where('fullname','LIKE','%'.$search.'%')->orderByDesc('created_at')->paginate(5);
        //         return view('monthly-payment/list',compact('monthlyPayments'));
        //     break;
        //     default:
        //         $monthlyPayments = $monthlyPayments->paginate(5);
        //         return view('monthly-payment/list',compact('monthlyPayments'));
          
                  
        // }
        if($filter=="")
        {
            $monthlyPayments = $monthlyPayments->paginate(5);
            return view('monthly-payment/index',compact('monthlyPayments'));
        }
        else
        {
            $monthlyPayments = $monthlyPayments->where($filter,'LIKE','%'.$search.'%')->orderByDesc('created_at')->paginate(5);
            return view('monthly-payment/index',compact('monthlyPayments'));
        }
       $monthlyPayments = MonthlyPayment::paginate(5);
        return view('monthly-payment/index',['monthlyPayments'=>$monthlyPayments]);
    }
    public function store(Request $request)
    {
         $request->validate([
           'newID'=>'required',
           'paymonth'=>'required',
           'paydate'=>'required',
           'description'=>'required',

       ]);
        $request->userCreated = Auth::user()->name;
        MonthlyPayment::create($request->all());

         return redirect()->route('monthly-payment.Index')
         ->with('success','payment added successfully!');
    
    
    }
    public function edit($id)
    {
        $monthlyPayment = MonthlyPayment::find($id);
        $monthlyPayment->paymonth = $monthlyPayment->dateFormat($monthlyPayment->paymonth,'Y-m-d');
        $monthlyPayment->paydate = $monthlyPayment->dateFormat($monthlyPayment->paydate,'Y-m-d');
        // $site->startDate = date('d-m-Y', strtotime($site->startDate));
       // return 
    //    $site->startDate = date("17-02-2021");
         return view('monthly-payment/edit',compact('monthlyPayment'));
       // dd($site->startDate);
        // $sites = Site::paginate(2);
        // return view('site-rental/list',['sites'=>$sites]);
    }
    public function delete($id)
    {
        DB::update('Update monthlypayments set isDeleted=1, userDeleted='.Auth::user()->id.' where id = ?',[$id]);
        return redirect()->route('monthly-payment.Index')
                        ->with('success','Monthly Payment has been deleted successfully');
        
    }
    public function update(Request $req)
    {
        $req->validate([
            'newID'=>['required'],
            'status'=>'required',
            'address'=>'required',
            'fullname'=>'required',
            'contact'=>'required',
            'paydate'=>'required',
            'paymonth'=>'required',

            
 
        ]);

        $data = MonthlyPayment::find($req->id);
        $data->newID = $req->newID;
        $data->oldID = $req->oldID;
        $data->status = $req->status;
        $data->address = $req->address;
        $data->fullname = $req->fullname;
        $data->contact = $req->contact;
        $data->paydate = $req->paydate;
        $data->paymonth = $req->paymonth;
        $data->description = $req->description;
        $data->remark = $req->remark;
        $data->lastUserEdited = Auth::user()->id;
        
         $data->save();
        return redirect()->route('monthly-payment.Index')
        ->with('success','monthly updated successfully!');
        
    }
    public function view($id)
    {
        $monthlyPayment = MonthlyPayment::find($id);
        //return $address;
        // $monthlyPayment->startDate = $site->dateFormat($site->startDate,'Y-m-d');
        // $monthlyPayment->endDate = $site->dateFormat($site->endDate,'Y-m-d');
        return view('monthly-payment/view',compact('monthlyPayment'));
    }
    public function exportIntoExcel(){
        return Excel::download(new MonthlyExport,'MonthlyPayment.xlsx');
    }
    public function exportIntoCSV(){
        return Excel::download(new MonthlyExport,'MonthlyPayment.csv');
    }
    public function export($monthlyPayments)
    {
        $monthlyPaymentsArray = explode(',',$monthlyPayments);
        //dd($monthlyPaymentsArray);
        return (new MonthlyPaymentsExport($monthlyPaymentsArray))->download('monthly-payment.xlsx');
        //return Excel::download(new SitesExport,'MonthlyPayment.xlsx');
    }
    

}

