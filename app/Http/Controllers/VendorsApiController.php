<?php

namespace App\Http\Controllers;
use App\Models\Vendor;
use App\Models\Site;
use App\Http\Resources\VendorResource;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
class VendorsApiController extends Controller
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
    public function update(Request $request, $id)
    {
        
        $post = Vendor::find($id);
        
        $post->vendor_name = $request->vendor_name;
        $post->vattin = $request->vattin;
        $post->update();
        return response()->json(['message'=>'Updated successfully!'], 200);
    }
    public function store(Request $request)
    {
        $post = new Vendor();
        $post->vendor_name = $request->vendor_name;
        $post->vattin = $request->vattin;
        $post->save();
        return response()->json(['message'=>'Saved successfully!'], 200);
    }
    public function destroy($id)
    {
        $post = Vendor::find($id);
        $post->delete();
        return response()->json(['message'=>'Deleted successfully!'], 200);
    }
   
}
