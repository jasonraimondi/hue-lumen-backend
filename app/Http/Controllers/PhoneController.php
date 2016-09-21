<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SendTwilioMessage;
use Validator;

class PhoneController extends Controller
{

    const WEBSITE_URL = 'https://flipp.jasonraimondi.com';

    public function index()
    {
        return view('index');
    }

    public function send(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|phone:US',
        ]);

        if ($validator->fails()) {
            $data = [
                'success' => false,
                'message' => 'Please enter a valid phone number.',
            ];
            return response()->json($data, 200);
        }

        $message = 'Event Farm is awesome: ' . self::WEBSITE_URL;

        $sendTwilioMessage = new SendTwilioMessage();

        $sendTwilioMessage->send($request->get('phone'), $message);

        $data = [
            'success' => true,
            'message' => 'Your message should be arriving shortly.'
        ];

        return response()->json($data, 200);
    }
}
