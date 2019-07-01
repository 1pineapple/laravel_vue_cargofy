<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\DataSend;

class SenderController extends Controller
{
    function send(DataSend $request){
        $validated = $request->validated();
        $endpoint = "http://dev.dispatcher24.com/api/onboard/manager";
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', $endpoint, ['query' => [
            'first_name' => $request['fname'],
            'last_name' => $request['lname'],
            'email'=>$request['email'],
            'phone'=>$request['phone'],
        ]]);

        $statusCode = $response->getStatusCode();
        if($statusCode == 201){
            $user = new User();
            $user->fname = $request['fname'];
            $user->lname = $request['lname'];
            $user->email = $request['email'];
            $user->phone = $request['phone'];
            $user->save();
            return response()->json(['success'=>true]);
        } else {
            abort($statusCode);
        }
    }
}
