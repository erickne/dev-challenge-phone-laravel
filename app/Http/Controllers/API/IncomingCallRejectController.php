<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Config;
use Illuminate\Http\Request;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;


class IncomingCallRejectController extends Controller
{
    /**
     * @throws ConfigurationException
     * @throws TwilioException
     */
    public function execute(Request $request): string
    {
        $twilio = new Client(Config::get('twillio.accountSid'), Config::get('twillio.token'));

        $callSid = $request->get('callSid');

        if (!$callSid) {
            throw new Exception('invalid callSid');
        }

        $call = $twilio->calls($callSid)->update(array(
            "status" => "completed"
        ));


        return response()->json(['status' => $call->status]);
    }
}
