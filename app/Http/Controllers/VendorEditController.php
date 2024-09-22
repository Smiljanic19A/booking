<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\VendorService;
use Illuminate\Http\Request;

class VendorEditController extends Controller
{
    public function serviceEditIndex(Request $request)
    {
        //catch vendor and catch the service
        $vendor = Vendor::where(["id" => $request->vendor_id])->first();
        $service = VendorService::where([
            "vendor_id" => $request->vendor_id,
            "name" => $request->name
        ])->first();

        if($vendor === null || $service === null){
            dd("kurac, nesto puklo");
        }
        //return them to the view
        return view("edit.service")->with([
           "vendor" => $vendor,
           "service" => $service
        ]);
    }
}
