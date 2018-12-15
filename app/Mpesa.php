<?php

namespace App;

use GuzzleHttp\Client;

class Mpesa extends Model
{




    public function authenticate()
    {
    	$url = 'https://sandbox.safaricom.co.ke/oauth/v1/';
        $client = new Client(['base_uri' => $url]);

		$response = $client->request('get', 'generate?grant_type=client_credentials', [
			'auth' => [env('MPESA_USERNAME'), env('MPESA_PASSWORD')],
			'debug' => true,
			'http_errors' => false,
			// 'json' => [
			// 	'sender' => env('SMS_SENDER_ID'),
			// 	'recipient' => '254702266217',
			// 	'message' => 'This is a successful test.',
			// ],
		]);

		$body = json_decode($response->getBody());
		$token = $body->access_token;
		$expires_in = $body->expires_in;
		echo 'Status code is ' . $response->getStatusCode();
		// dd($body);
    }

    

}
