<?php

namespace App\Providers;

use App\Models\SmsResponse;
use App\Models\SMSTemplate;
use App\Providers\ParticipantAdded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendSMSNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Providers\ParticipantAdded  $event
     * @return void
     */
    public function handle(ParticipantAdded $event)
    {
        $sms_template = SMSTemplate::find(1);
        $message = $sms_template->message ?? 'SMS est envoyé';
        $url = 'https://ag2m.ma/api.php';
        $data = [
            'user' => 'stopdrogue',
            'password' => 'sToPdr0gUE2023',
            'gsm' => $event->participant->participant_tele,
            'sms' => $message,
        ];
        $options = [
            'http' => [
                'header' => 'Content-Type: application/x-www-form-urlencoded\r\n',
                'method'  => 'POST',
                'content' => http_build_query($data),
            ],
        ];
        $context  = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        $smsResponse = new SmsResponse;
        $smsResponse->content_response = $response;
        $event->participant->sms_responses()->save($sms_template);
    }
}
