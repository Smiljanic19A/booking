<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $table = "vendors";

    protected $fillable = ["user_id", "name", "contact_number", "description", "location", "instagram_url"];
}
