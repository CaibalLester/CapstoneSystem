<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ClientModel;

class ClientController extends BaseController
{
    private $user;
    private $client;
    public function __construct()
    {
        $this->user = new UserModel();
        $this->client = new ClientModel();
    }
    public function ClientPage()
    {
        return view('Client/ClientPage');
    }

    public function services()
    {
        return view('Client/services');
    }
    

    public function servicesdetails()
    {
        return view('Client/servicesdetails');
    }

    public function pricing()
    {
        return view('Client/pricing');
    }

    public function contactus()
    {
        return view('Client/contactus');
    }



    public function ClientWell()
    {
        return view('Client/ClientWell');
    }
    public function ClientCompass()
    {
        return view('Client/ClientCompass');
    }

    public function register()
    {
        return view('Client/register');
    }

    public function login()
    {
        return view('Client/login');
    }
}
