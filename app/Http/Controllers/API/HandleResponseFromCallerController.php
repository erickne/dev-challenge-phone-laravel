<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Twilio\TwiML\VoiceResponse;


class HandleResponseFromCallerController extends Controller
{
    public function execute(Request $request): string
    {
        $voice = new VoiceResponse();
        $input = (int)$request->input('Digits');

        switch ($input) {
            case 1:
                $voice->dial(null, [
                    'answerOnBridge' => true,
                ])->client('erickengelhardt');
                break;
            case 2:
                $voice->say('Please leave a message after the beep.');
                $voice->record(['action' => '/api/handle_recording']);
                break;
            default:
                $voice->hangup();
                break;
        }

        return $voice->asXML();
    }
}
