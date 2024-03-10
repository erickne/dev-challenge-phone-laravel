<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Config;
use Illuminate\Http\Request;
use Twilio\Rest\Client;


class IncomingCallAcceptController extends Controller
{
    public function execute(Request $request): string
    {
        $twilio = new Client(Config::get('twillio.accountSid'), Config::get('twillio.token'));

        $callSid = $request->get('callSid');

        if (!$callSid) {
            throw new Exception('invalid callSid');
        }

        $call = $twilio->calls($callSid)->update(array(
                "status" => "in-progress"
            ));

        return response()->json(['status' => $call->status]);
    }
}
