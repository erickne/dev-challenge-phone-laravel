<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VoiceGrant;


class GenerateAccessTokenController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @throws Exception
     */
    public function execute(Request $request): JsonResponse
    {
        $accountSid = Config::get('twilio.accountSid');
        $apiKeySid = Config::get('twilio.apiKeySid');
        $apiKeySecret = Config::get('twilio.apiKeySecret');

        $identity = $request->identity;
        if (!$identity) {
            throw new \Exception('invalid id');
        }

        $token = new AccessToken($accountSid, $apiKeySid, $apiKeySecret, 3600, $identity);

        $grant = new VoiceGrant();
        $grant->setIncomingAllow(true);

        $token->addGrant($grant);

        // Serialize the token as a JWT
        $result = [
            "identity" => $identity,
            "token" => $token->toJWT()
        ];

        return response()->json($result);
    }

}
