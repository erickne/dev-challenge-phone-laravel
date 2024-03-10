<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Call;
use App\Services\Twilio\UpdateCallStatusTwilioService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;


class IncomingCallAcceptController extends Controller
{
    /**
     * @throws ConfigurationException
     * @throws TwilioException
     * @throws \Exception
     */
    public function execute(Request $request): \Illuminate\Http\JsonResponse
    {
        $callSid = $request->get('callSid');

        $service = new UpdateCallStatusTwilioService();
        $status = $service->execute($callSid, "in-progress");

        return response()->json(['status' => $status], $status ? 200 : 422);
    }
}
