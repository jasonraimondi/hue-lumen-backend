<?php

namespace App;

use libphonenumber\NumberParseException;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\PhoneNumberUtil;
use Twilio\Rest\Client;

class SendTwilioMessage
{
    private $client;
    private $twilioAccountSid;
    private $twilioAuthToken;
    private $twilioPhoneNumber;

    /**
     * SmsMessage constructor.
     */
    public function __construct()
    {
        $this->twilioAccountSid = env('TWILIO_ACCOUNT_SID');
        $this->twilioAuthToken = env('TWILIO_AUTH_TOKEN');
        $this->twilioPhoneNumber = env('TWILIO_PHONE_NUM');
        $this->client = new Client($this->twilioAccountSid, $this->twilioAuthToken);
    }

    /**
     * @param string $to
     * @param string $message
     *
     * @return \Twilio\Rest\Api\V2010\Account\MessageInstance
     * @internal param $from
     */
    public function send(string $to, string $message)
    {
        $to = $this->formatPhoneNumber($to, 'US', PhoneNumberFormat::E164);

        return $this->client->api->v2010->account->messages->create(
            $to,
            [
                'from' => $this->twilioPhoneNumber, // From a valid Twilio number
                'body' => $message
            ]
        );
    }

    /**
     * @param string $phoneNumber
     * @param string $countryAbbr
     * @param string $format
     *
     * @return \libphonenumber\PhoneNumber|string
     */
    public function formatPhoneNumber(string $phoneNumber, string $countryAbbr, string $format) : string
    {
        $phoneUtil = PhoneNumberUtil::getInstance();

        try {
            $phoneNumber = $phoneUtil->parse($phoneNumber, $countryAbbr);
        } catch (NumberParseException $e) {
            throwException(NumberParseException::class);
        }

        $phoneNumber = $phoneUtil->format($phoneNumber, $format);

        return $phoneNumber;
    }
}