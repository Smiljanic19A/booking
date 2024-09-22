<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorDesignSettings extends Model
{
    protected $table = "vendor_design_settings";
    protected $fillable = ["template_id", "logo_name", "primary_color", "secondary_color", "accent_color"];
}
