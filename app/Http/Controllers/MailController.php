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
        $this->mailService->sendEmail(config('message.mailBody'));
        return $this->httpResponseUtility->successResponse(null, config('message.mailSuccess')); 
    }
}
