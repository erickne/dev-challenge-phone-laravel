<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Call;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Twilio\TwiML\VoiceResponse;


class HandleIncomingCallsController extends Controller
{
    public function execute(Request $request): string
    {
        $voice = new VoiceResponse();

        DB::beginTransaction();
        try {

            Call::updateOrCreate(
                ['CallSid' => $request->post('CallSid')],
                $request->post()
            );

            $gather = $voice->gather(['numDigits' => 1, 'action' => '/api/handle_response']);
            $gather->say('For forwarding the call to an agent, press 1. To record a voicemail, press 2.');

//            $voice->dial(null, [
//                'answerOnBridge' => true,
//            ])->client('erickengelhardt');

            DB::commit();
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            DB::rollBack();
        }

        return $voice->asXML();
    }
}
