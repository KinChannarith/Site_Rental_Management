<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;
use App\Models\MonthlyPayment;

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
        return dd(MonthlyPayment::paginate(5));
        // $search = $request->input('search');
        // $filter = $request->input('filter');
        // $startDateFrom = $request->input('startDateFrom');
        // $endDateFrom = $request->input('endDateFrom');
        // $startDateTo = $request->input('startDateTo');
        // $endDateTo = $request->input('endDateTo');
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
        //         return view('site-rental/list',compact('sites'));
          
                  
        // }
    //    $sites = Site::paginate(5);
    //     return view('site-rental/list',['sites'=>$sites]);
    }
    public function store(Request $request)
    {
    //     $request->validate([
    //        'newID'=>'required',

    //    ]);
       
        MonthlyPayment::create($request->all());

         return redirect()->route('monthly-payment.Index')
         ->with('success','payment added successfully!');
    
    
    }
}

