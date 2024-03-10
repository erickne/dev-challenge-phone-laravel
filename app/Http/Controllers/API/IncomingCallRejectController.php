<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\Twilio\UpdateCallStatusTwilioService;
use Illuminate\Http\Request;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Exceptions\TwilioException;


class IncomingCallRejectController extends Controller
{
    /**
     * @throws ConfigurationException
     * @throws TwilioException
     * @throws \Exception
     */
    public function execute(Request $request): string
    {
        $callSid = $request->get('callSid');

        $service = new UpdateCallStatusTwilioService();
        $status = $service->execute($callSid, "completed");

        return response()->json(['status' => $status], $status ? 200 : 422)->getContent();
    }
}
