<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    use HasFactory;

    protected $fillable = [
        "AccountSid",
        "ApiVersion",
        "CallSid",
        "CallStatus",
        "CallToken",
        "Called",
        "CalledCity",
        "CalledCountry",
        "CalledState",
        "CalledZip",
        "Caller",
        "CallerCity",
        "CallerCountry",
        "CallerState",
        "CallerZip",
        "Direction",
        "From",
        "FromCity",
        "FromCountry",
        "FromState",
        "FromZip",
        "To",
        "ToCity",
        "ToCountry",
        "ToState",
        "ToZip",
    ];
}
