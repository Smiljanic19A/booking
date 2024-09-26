<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorScheduleSettings extends Model
{
    protected $table = 'vendor_schedule_settings';
    protected $fillable = ['vendor_id', "auto-approve", 'auto-cancel', 'default_workdays', 'default_schedule', 'open_for'];
}
