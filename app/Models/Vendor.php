<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Vendor extends Model
{
    protected $table = "vendors";

    protected $fillable = ["user_id", "name", "contact_number", "description", "location", "instagram_url"];

    public function user(): HasOne
    {
        return $this->hasOne(User::class, "id", "user_id");
    }
}
