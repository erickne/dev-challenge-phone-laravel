<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Config;
use Exception;
use Illuminate\Http\Request;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VoiceGrant;


class GenerateAccessTokenController extends Controller
{
    //
    public function execute(Request $request)
    {
        $accountSid = Config::get('twillio.accountSid');
        $apiKeySid = Config::get('twillio.apiKeySid');
        $apiKeySecret = Config::get('twillio.apiKeySecret');
        $twiMLSid = Config::get('twillio.twiMLSid');
        $phoneNumber = Config::get('twillio.phoneNumber');

        $identity = $request->identity;
        if (!$identity) {
            throw new Exception('invalid id');
        }
        // Double check!
//        $identity = $phoneNumber;
//        $identity ='AP3a0b5aea88ba7c665f57b160bfb9c25a';
        $identity = 'erickengelhardt';

        $token = new AccessToken(
            $accountSid, $apiKeySid, $apiKeySecret, 3600, $identity
//            $accountSid, $apiKeySid, $apiKeySecret, 3600
        );

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
