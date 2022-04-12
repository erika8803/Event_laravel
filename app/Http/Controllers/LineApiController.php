<?php

namespace EventApp\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use EventApp\Event;

class LineApiController extends Controller
{
    protected $access_token;
    protected $channel_secret;

    public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function pushSend(Request $request) {
        // Lineトークン
        $token = 'mDjzgraap4yNujy4IO2Ys1IbG7oiGkyPWDNKBVZoYUM';

        $event = Event::find($request->id)->toArray();
        $message = "【日付】" . $event["date"] ."【タイトル】" . $event['title'] . "【詳細】" . $event['comment'];
        // $message .= $event['comment'];
  
        $query = http_build_query(['message' => $message ]);
        $header = [
                'Content-Type: application/x-www-form-urlencoded',
                'Authorization: Bearer ' . $token,
                'Content-Length: ' . strlen($query)
        ];
        $ch = curl_init('https://notify-api.line.me/api/notify');
        $options = [
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_POST            => true,
            CURLOPT_HTTPHEADER      => $header,
            CURLOPT_POSTFIELDS      => $query,
            CURLINFO_HEADER_OUT => true,
        ];
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt_array($ch, $options);
        curl_exec($ch);

    }

    public function sendMessage(Request $request) {
        // Lineトークン
        $token = 'mDjzgraap4yNujy4IO2Ys1IbG7oiGkyPWDNKBVZoYUM';

        $events = Event::latest()->get();
        foreach($events as $key => $event) {
            $today = date('Y-m-d');
            
            $day = date("Y-m-d", strtotime($event['date']));
            if( $today == $day ) {
                $message = "【日付】". 
                $event['date'] . "【タイトル】" . $event['title'] . "【詳細】" . $event['comment'];;
                $query = http_build_query(['message' => $message ]);
                $header = [
                        'Content-Type: application/x-www-form-urlencoded',
                        'Authorization: Bearer ' . $token,
                        'Content-Length: ' . strlen($query)
                ];
                $ch = curl_init('https://notify-api.line.me/api/notify');
                $options = [
                    CURLOPT_RETURNTRANSFER  => true,
                    CURLOPT_POST            => true,
                    CURLOPT_HTTPHEADER      => $header,
                    CURLOPT_POSTFIELDS      => $query,
                    CURLINFO_HEADER_OUT => true,
                ];
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt_array($ch, $options);
                curl_exec($ch);
                curl_close($ch);
            }
        }
    }
}


