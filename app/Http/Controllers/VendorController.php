<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceCreationRequest;
use App\Models\Vendor;
use App\Models\VendorService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VendorController extends Controller
{
    public function pushToXSetup(string $page, Vendor $vendor)
    {
        $return = Null;
        switch ($page){
            case "privacy":
                $return = view("setup.privacy");
                break;
            case "services":
                $services = VendorService::where(["vendor_id" => $vendor->id])->get();
                $return = view("setup.services")->with("services", $services);
                break;
            case "schedule":
                $return = view("setup.schedule");
                break;
            case "design":
                $return = view("setup.design");
                break;
            case "settings":
                $return = view("setup.settings");
                break;
        }
        return $return->with("vendor", $vendor);
    }

    public function addService(ServiceCreationRequest $request)
    {
        //dd($request->all());
        $serviceCreated = false;
        //fetch vendor
        $vendor = Vendor::where(["id" => $request->vendor_id])->first();
        //validate the user does not already have the service
        $exists = VendorService::where(["name" => $request->name])->first();
        //create the service
        if($exists === null){
            $params = $request->except("_token");
            $newService = VendorService::create($params);
            $serviceCreated = true;
        }
        //redirect back, with that service and the vendor
        $message = $serviceCreated ? "Created Service!" : "You Already Have This Service";
        $services = VendorService::where(["vendor_id" => $request->vendor_id])->get();

        return redirect()->back()->with([
            "vendor" => $vendor,
            "message" => $message,
            "services" => $services
        ]);
    }
}
