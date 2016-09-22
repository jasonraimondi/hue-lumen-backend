<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SendTwilioMessage;
use Validator;

class PhoneController extends Controller
{

    const WEBSITE_URL = 'http://flipp.jasonraimondi.com';

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
                'message' => 'No, we need your cell.',
            ];
            return response()->json($data, 200);
        }

        $message = 'What are you waiting for? Click the link!' . self::WEBSITE_URL;

        $sendTwilioMessage = new SendTwilioMessage();

        $sendTwilioMessage->send($request->get('phone'), $message);

        $data = [
            'success' => true,
            'message' => 'Your message is on the way!'
        ];

        return response()->json($data, 200);
    }
}
