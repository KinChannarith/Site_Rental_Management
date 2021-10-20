<?php

namespace App\Http\Controllers;
use App\Http\Resources\MonthlyPaymentVoucherResource;
use App\Models\MonthlyPaymentVoucher;
use Illuminate\Support\Facades\Auth;
use App\Models\MonthlyPayment;
use Illuminate\Http\Request;

class MonthlyPaymentVouchersApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        //
        
        $id = $req->input('id');
         //dd($id);
         $vouchers= MonthlyPaymentVoucher::where('monthlyPaymentID','=',$id)->get();
        //response($vouchers);
    
        return MonthlyPaymentVoucherResource::collection($vouchers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function getVouchers($monthlyPaymentID)
    // {

    //     $vouchers = MonthlyPaymentVoucher::where('monthlyPaymentID','=',$monthlyPaymentID)->get();
    //     return MonthlyPaymentVoucherResource::collection($vouchers);
         


    // }
    public function store(Request $request)
    {
       
        $post = MonthlyPayment::latest()->limit(1)->get();
        $r = new MonthlyPaymentVoucher();
        $r->vendor_name = $request->vendor_name;
        $r->vattin = $request->vattin;
        $r->voucher = $request->voucher;
        $r->monthlyPaymentID = $post[0]->id;
        
        //echo($post[0]);
        // $r->monthlyPaymentID=$post->id;
        //echo($r->vendor_name);
        // echo($r->vattin);
        $r->save();
        // $post = new Vendor();
        // $post->vendor_name = $request->vendor_name;
        // $post->vattin = $request->vattin;
        // $post->voucher = $request->voucher;
        // $post->monthlyPaymentID = $request->monthlyPaymentID;
        // $post->save();
        //return response()->json(['message'=>'Saved successfully!'], 200);
    }
    public function readData(Request $req)
    {
        // dd("readDate");
        // $id = $req->input('id');
        //  //dd($id);
        //  $vouchers= MonthlyPaymentVoucher::where('monthlyPaymentID','=',$id)->get();
        // //response($vouchers);
        // //dd($vouchers);
        // return MonthlyPaymentVoucherResource::collection($vouchers);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\monthlyPaymentVouchers  $monthlyPaymentVouchers
     * @return \Illuminate\Http\Response
     */
    // public function show(monthlyPaymentVouchers $monthlyPaymentVouchers)
    // {
    //     //
       
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\monthlyPaymentVouchers  $monthlyPaymentVouchers
     * @return \Illuminate\Http\Response
     */
    public function edit(monthlyPaymentVouchers $monthlyPaymentVouchers)
    {
        //
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\monthlyPaymentVouchers  $monthlyPaymentVouchers
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $id)
    {
      
        $post = MonthlyPaymentVoucher::find($id);
        $post->vendor_name = $request->vendor_name;
        $post->vattin= $request->vattin;
        $post->voucher = $request->voucher;
        // $post->vendor_name = $request->vendor_name;
        // $post->vattin = $request->vattin;
        $post->update();
        return response()->json(['message'=>'Updated successfully!'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\monthlyPaymentVouchers  $monthlyPaymentVouchers
     * @return \Illuminate\Http\Response
     */
    public function destroy(monthlyPaymentVouchers $monthlyPaymentVouchers)
    {
        //
       
    }


}
