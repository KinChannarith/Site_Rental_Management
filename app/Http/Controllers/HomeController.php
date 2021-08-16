<?php

namespace App\Http\Controllers;
use App\Models\Site;
use App\Models\MonthlyPayment;
use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      
        //$record = DB::table('monthlypayments')->select(DB::raw('select count(*) AS total'));
        // $record = DB::table('sites')->where('isDeleted',0);
        $record=Site::where('isDeleted',0)->paginate(5);
        $payInMonth = MonthlyPayment::where('isDeleted',0)->where('paymonth','=','2021-08-01')->paginate(5);
        return view("welcome",compact('record','payInMonth'));
    }
}
