<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SenderController extends Controller
{
    function send(Request $request){
        $endpoint = "http://dev.dispatcher24.com/api/onboard/manager";
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', $endpoint, ['query' => [
            'first_name' => $request['fname'], 
            'last_name' => $request['lname'],
            'email'=>$request['email'],
            'phone'=>$request['phone'],
        ]]);
        
        $statusCode = $response->getStatusCode();
        $content = $response->getBody();
        if($statusCode == 201){
            return response()->json(['success'=>true]);
        } else {
            return response()->json(['error'=>true]);
        }
    }
}
