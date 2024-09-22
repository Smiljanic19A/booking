<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorPrivacySettings extends Model
{
    protected $table = "vendor_privacy_settings";
    protected $fillable = ["vendor_id", "public", "private_location", "pat"];
}
