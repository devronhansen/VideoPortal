<?php

namespace App\Http\Controllers;

use Miguel_Costa\Office365API\ConnectAPI;
use App\SocialAccountService;
use Session;

class SocialAuthController extends Controller
{
    public function redirect()
    {
        ConnectAPI::connect_officeAPI();
    }

    public function callback(SocialAccountService $service)
    {
        ConnectAPI::get_connection();
        $token = $_GET['code'];
        $email = Session::get('office365_email');
        $name = Session::get('office365_name');
        $user = $service->createOrGetUser($token, $name, $email);
        auth()->login($user);
        return redirect()->to('/');
    }
}
