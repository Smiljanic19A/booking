<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceCreationRequest;
use App\Http\Requests\VendorDesignSettingsRequest;
use App\Models\Vendor;
use App\Models\VendorDesignSettings;
use App\Models\VendorPrivacySettings;
use App\Models\VendorService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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

    public function deleteService(Request $request)
    {
        //TODO ADD VALIDATION THAT THIS SERVICE IS NOT BOOKED!!!

        $service = VendorService::where([
            "vendor_id" => $request->vendor_id,
            "name" => $request->name
        ])->first();

        $service->delete();

        return redirect()->back()->with(["message" => "Service Deleted"]);
    }

    public function savePrivacySettings(Request $request)
    {
        $vendor = Vendor::where(["id" => $request->vendor_id])->first();
        //create the params
        $isPublic = $request->isPublic;
        $privateLocation = $isPublic === "0" ? 1 : $request->private_location;

        $pat = $this->generatePersonalAccessToken();

        $settings = VendorPrivacySettings::create([
            "vendor_id" => $vendor->id,
            "public" => $isPublic,
            "private_location" => $privateLocation,
            "pat" => $isPublic ? null : $pat
        ]);

        return redirect()->route("home.vendor", ["vendor" => $vendor])->with("message", "Privacy Settings Updated");

    }

    public function saveDesignSettings(VendorDesignSettingsRequest $request)
    {
        $vendor = Vendor::where(["id" => $request->vendor_id])->first();


        $primaryColor = $request->primary_color === '-1' ? null : $request->primary_color;
        $secondaryColor = $request->secondary_color === '-1' ? null : $request->secondary_color;
        $accentColor = $request->accent_color === '-1' ? null : $request->accent_color;

        $designSettings = VendorDesignSettings::create([
            "vendor_id" => $request->vendor_id,
            "template_id" => $request->template_id,
            "logo_name" => null, //todo: implement image storing
            "primary_color" => $primaryColor,
            "secondary_color" => $secondaryColor,
            "accent_color" => $accentColor
        ]);

        return redirect()->route("home.vendor", ["vendor" => $vendor])->with("message", "Design Settings Updated");
    }
    // todo: should move this to a helper, or a service once refactoring
    public function generatePersonalAccessToken()
    {
        $unique = false;

        while (!$unique) {
            // Generate a random 20-character token
            $pat = Str::random(20);

            // Check if the generated token is unique in the VendorPrivacySettings
            $exists = VendorPrivacySettings::where('pat', $pat)->exists();

            if (!$exists) {
                // If unique, exit the loop
                $unique = true;
            }
        }
        // Return or store the generated token
        return $pat;
    }


}
