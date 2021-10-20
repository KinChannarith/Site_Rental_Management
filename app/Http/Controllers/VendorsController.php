<?php

namespace App\Http\Controllers;
use App\Models\Vendor;
use App\Models\Site;
use App\Http\Resources\VendorResource;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
class VendorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors=Vendor::where('isDeleted','=',0)->orderBy('created_at','ASC')->paginate(5);
        
        return view('vendor-list/list',compact('vendors'));




        //return view('vendor-list/testVue');
    }
    public function vendor(){
        $vendor_name = request('SVendorName');
        $vattin = request('SVattin');
        //dd($vendor_name);
        $paginate = request('paginate');
        if($paginate!="")
        {
            $paginate = (int)$paginate;
            $vendors = Vendor::search(trim($vendor_name),trim($vattin))->paginate(5);
        }
        else
        {
            $vendors = Vendor::search(trim($vendor_name),trim($vattin))->get();
        }
        return VendorResource::collection($vendors);
    }
    public function create()
    {
        //
        return view('vendor-list/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
        //     $vendor = $request->isMethod('put') ? Vendor::findOrFail($request->vendor_id) : new Vendor;
        //     $vendor->id = $request->input('vendor_id');
        //     $vendor->vendor_name = $request->input('vendor_name');
        //     $vendor->vattin = $request->input('vattin');

        // if($vendor->save()) {
        //     return new VendorResource($vendor);
        // }
            $request->userCreated = Auth::id();
            // dd($request->userCreated)

           Vendor::create($request->all());

        return redirect()->route('vendor-list.Index')
        ->with('success','vendor added successfully!');
      
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Vendor $vendor)
    // {
    //     //
    // }
    public function update(Request $request)
    {
        $update=[
            'vendor_name' => $request->vendor_name,
            'vattin' => $request->vattin
        ];
        
        DB::table('vendors')->where('id',$request->id)->update($update);
        return redirect()->back()->with('success','Has been update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        //
    }
}
