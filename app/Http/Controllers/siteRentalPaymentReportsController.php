<?php

namespace App\Http\Controllers;
use App\Models\MonthlyPayment;
use App\Models\siteRentalPaymentReport;
use Illuminate\Http\Request;

class siteRentalPaymentReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reports=MonthlyPayment::where('isDeleted','=',0)->orderByDesc('created_at');
        $reports = $reports->paginate(5);
        //dd($monthlyPayments);
        return view('site-rental-payment-report/list',compact('reports'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\siteRentalPaymentReport  $siteRentalPaymentReport
     * @return \Illuminate\Http\Response
     */
    public function show(siteRentalPaymentReport $siteRentalPaymentReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\siteRentalPaymentReport  $siteRentalPaymentReport
     * @return \Illuminate\Http\Response
     */
    public function edit(siteRentalPaymentReport $siteRentalPaymentReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\siteRentalPaymentReport  $siteRentalPaymentReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, siteRentalPaymentReport $siteRentalPaymentReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\siteRentalPaymentReport  $siteRentalPaymentReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(siteRentalPaymentReport $siteRentalPaymentReport)
    {
        //
    }
}
