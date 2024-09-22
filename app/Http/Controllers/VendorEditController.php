<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceEditRequest;
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

    public function editService(ServiceEditRequest $request)
    {

        $service = VendorService::where(['id' => $request->service_id])->first();
        $vendor = Vendor::where(['id' => $request->vendor_id])->first();

        if($service === null || $vendor === null){
            dd("kurac nesto puklo");
        }

        $service->update($request->except(['_token', 'service_id', 'vendor_id']));

        //fetch all services
        $services = VendorService::where(["vendor_id" => $request->vendor_id])->get();
        $message = "Service Edited Succesfully";

        return redirect()->route("setup.page", ["page" => "services", "vendor" => $vendor->id])->with([
            "services" => $services,
            "message" => $message,
            "vendor" => $vendor
            ]);

    }
}
