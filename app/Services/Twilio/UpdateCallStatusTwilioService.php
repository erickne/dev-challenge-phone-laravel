<?php

namespace App\Services\Twilio;

use App\Models\Call;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Rest\Client;

class UpdateCallStatusTwilioService
{
    public function __construct()
    {
    }

    /**
     * @throws ConfigurationException
     * @throws \Exception
     */
    public function execute($callSid, $status)
    {
        if (!$callSid) {
            throw new \Exception('invalid callSid');
        }

        if (!$status) {
            throw new \Exception('invalid status');
        }

        $twilio = new Client(Config::get('twillio.accountSid'), Config::get('twillio.token'));

        try {
            $call = $twilio->calls($callSid)->update(array(
                "status" => $status
            ));
            if ($call->status !== $status) {
                throw new \Exception('Could not update Twilio call');
            }
            Call::updateOrCreate(
                ['CallSid' => $callSid], ["status" => $status]
            );
            return true;
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return false;
        }
    }
}
