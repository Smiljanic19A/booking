<?php

namespace App\Http\Controllers;

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
}
