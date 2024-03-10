<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Call;
use Illuminate\Http\Request;
use Twilio\TwiML\VoiceResponse;


class GetAllCallsController extends Controller
{
    public function execute(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Call::all()->toArray());
    }
}
