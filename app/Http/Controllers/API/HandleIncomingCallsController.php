<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Config;
use Exception;
use Illuminate\Http\Request;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VoiceGrant;
use Twilio\TwiML\VoiceResponse;


class HandleIncomingCallsController extends Controller
{
    public function execute(Request $request): string
    {
        $voice = new VoiceResponse();

        $voice->dial(null, [
                'answerOnBridge' => true,
            ])->client('erickengelhardt');

        return $voice->asXML();
    }
}
