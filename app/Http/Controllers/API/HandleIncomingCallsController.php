<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Call;
use Config;
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

            $voice->dial(null, [
                'answerOnBridge' => true,
            ])->client('erickengelhardt');

            DB::commit();
        } catch (Exception $ex) {
            dd($ex);
            DB::rollBack();
        }

        return $voice->asXML();
    }
}
