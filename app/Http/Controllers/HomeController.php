<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = $this->get(config('filesystems.apiUrl').'input-types');
        $inputs = json_decode($data->getBody()->getContents())->result;
        return view('welcome', compact('inputs'));
    }

    public function sendEmail()
    {
        return $this->get(config('filesystems.apiUrl').'send-email');
    }
}