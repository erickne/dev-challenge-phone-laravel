<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calls', function (Blueprint $table) {
            $table->id();
            $table->string("AccountSid");//: "ACb41320125184583ee80a3a5b45445a59",
            $table->string("ApiVersion")->nullable();//: "2010-04-01",
            $table->string("CallSid");//: "CA900d27cadb7f7316db0f314823a3b29b",
            $table->string("CallStatus");//: "ringing",
            $table->text("CallToken")->nullable();
            //: "%7B%22parentCallInfoToken%22%3A%22eyJhbGciOiJFUzI1NiJ9.eyJjYWxsU2lkIjoiQ0E5MDBkMjdjYWRiN2Y3MzE2ZGIwZjMxNDgyM2EzYjI5YiIsImZyb20iOiIrNTUyMTk5NDYzMTk5NCIsInRvIjoiKzE5MDgzODgxMTUxIiwiaWF0IjoiMTcxMDA4MDg1NCJ9.E1NszzG2fw59yHV0LkFN_vXGKcA8uJ6Ts5ltzkyv1a7vIl5Jcc8LYfL_QQqqb7QZDVwfc1hmoLVERMhd-vKg6A%22%2C%22identityHeaderTokens%22%3A%5B%5D%7D",
            $table->string("Called")->nullable();//: "+19083881151",
            $table->string("CalledCity")->nullable();//: "BLOOMSBURY",
            $table->string("CalledCountry")->nullable();//: "US",
            $table->string("CalledState")->nullable();//: "NJ",
            $table->string("CalledZip")->nullable();//: "07076",
            $table->string("Caller")->nullable();//: "+5521994631994",
            $table->string("CallerCity")->nullable();//: "Rio de Janeiro",
            $table->string("CallerCountry")->nullable();//: "BR",
            $table->string("CallerState")->nullable();//: "RJ",
            $table->string("CallerZip")->nullable();//: null,
            $table->string("Direction")->nullable();//: "inbound",
            $table->string("From")->nullable();//: "+5521994631994",
            $table->string("FromCity")->nullable();//: "Rio de Janeiro",
            $table->string("FromCountry")->nullable();//: "BR",
            $table->string("FromState")->nullable();//: "RJ",
            $table->string("FromZip")->nullable();//: null,
            $table->string("RecordingDuration")->nullable();//: "5",
            $table->string("RecordingSid")->nullable();//: "REa17e70c00dae6e50fbc8862987a61cef",
            $table->text("RecordingUrl")->nullable();//: "https:\/\/api.twilio.com\/2010-04-01\/Accounts\/ACb41320125184583ee80a3a5b45445a59\/Recordings\/REa17e70c00dae6e50fbc8862987a61cef",
            $table->string("To")->nullable();//: "+19083881151",
            $table->string("ToCity")->nullable();//: "BLOOMSBURY",
            $table->string("ToCountry")->nullable();//: "US",
            $table->string("ToState")->nullable();//: "NJ",
            $table->string("ToZip")->nullable();//: "07076"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calls');
    }
}
