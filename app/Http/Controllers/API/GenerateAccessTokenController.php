<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VoiceGrant;

class GenerateAccessTokenController extends Controller
{
    //
    public function generate_token(Request $request)
    {

        // Substitute your Twilio Account SID and API Key details
//        $accountSid = ('ACb41320125184583ee80a3a5b45445a59');//PROD
        $accountSid = ('ACcad9f0a12d81689ca0d1cb3f9b9f67a1');//TEST
        $apiKeySid = ('SKaae49cd1e6252ff762634e61968eeb8e');
        $apiKeySecret = ('vALqvhySXLsI6dacfX95eJs3HTWvZDfJ');
        $identity = $request->identity;

        // Create an Access Token
        $token = new AccessToken(
            $accountSid,
            $apiKeySid,
            $apiKeySecret,
            3600,
            $identity,
        );

        // Grant access to Voice
        $grant = new VoiceGrant();

        $token->addGrant($grant);

        // Serialize the token as a JWT
        $result=[
            "identity" => $identity,
            "token"=> $token->toJWT()
        ];

        return response()->json($result);
    }
}
