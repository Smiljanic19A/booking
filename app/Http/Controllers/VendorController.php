<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class VendorController extends Controller
{
    public function pushToXSetup(string $page)
    {
        $return = Null;
        switch ($page){
            case "privacy":
                $return = view("setup.privacy");
                break;
            case "services":
                $return = view("setup.services");
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
        return $return;
    }
}
