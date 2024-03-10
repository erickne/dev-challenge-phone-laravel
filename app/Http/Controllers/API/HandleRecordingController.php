<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Call;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Twilio\TwiML\VoiceResponse;


class HandleRecordingController extends Controller
{
    /**
     * @throws \JsonException
     */
    public function execute(Request $request): \Illuminate\Http\JsonResponse
    {
        Log::debug("RECORDING");
        Log::debug(json_encode($request->post(), JSON_THROW_ON_ERROR));

        $call = Call::updateOrCreate(
            ['CallSid' => $request->post('CallSid')],
            $request->post()
        );

        return response()->json($call->toArray());
    }
}
