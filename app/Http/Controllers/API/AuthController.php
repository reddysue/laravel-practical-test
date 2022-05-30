<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use App\Http\Resources\LoginResource;
use App\Http\Utilities\HttpResponseUtility;
use App\Http\Controllers\Controller as Controller;

class AuthController extends Controller
{
    protected $authService;
    protected $httpResponseUtility;

    public function __construct(AuthService $authService, HttpResponseUtility $httpResponseUtility)
    {
        $this->httpResponseUtility = $httpResponseUtility;
        $this->authService = $authService;
    }

    public function register(RegisterRequest $request)
    {
        $result = $this->authService->register($request);
        if ($result['isRegister'] == true){
            return $this->httpResponseUtility->successResponse(null, $result['message']); 
        } else{
            return $this->httpResponseUtility->createResponse(null, $result['message']);
        }
    }

    public function login(LoginRequest $request)
    {
        $result = $this->authService->login($request);
        return $this->httpResponseUtility->successResponse(['data'=>new LoginResource($result['data']), 'accessToken' => $result['token']]);
    }
}
