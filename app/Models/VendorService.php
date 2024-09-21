<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorService extends Model
{

    protected $table = "vendor_services";
    protected  $fillable = ["vendor_id", "name", "price", "duration_in_minutes", "description"];

}
