<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MailService;
use App\Http\Utilities\HttpResponseUtility;

class MailController extends Controller
{
    protected $authService;
    protected $httpResponseUtility;

    public function __construct(MailService $mailService, HttpResponseUtility $httpResponseUtility)
    {
        $this->mailService = $mailService;
        $this->httpResponseUtility = $httpResponseUtility;
    }

    public function index(Request $request)
    {
        
        $body = view('email', compact('setting'));
        $this->mailService->sendEmail($body);
        return $this->httpResponseUtility->successResponse(null, config('message.mailSuccess')); 
    }
}
