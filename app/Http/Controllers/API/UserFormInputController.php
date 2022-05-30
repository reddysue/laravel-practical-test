<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\InputTypeRequest;
use App\Services\FormInputService;
use App\Http\Resources\InputTypeResource;
use App\Http\Utilities\HttpResponseUtility;
use App\Http\Controllers\Controller as Controller;

class UserFormInputController extends Controller
{
    protected $formInputService;
    protected $httpResponseUtility;

    public function __construct(FormInputService $formInputService, HttpResponseUtility $httpResponseUtility)
    {
        $this->httpResponseUtility = $httpResponseUtility;
        $this->formInputService = $formInputService;
    }

    public function add(InputTypeRequest $request)
    {
        $this->formInputService->add($request);
        return $this->httpResponseUtility->createResponse();
    }

    public function list()
    {
        $result = $this->formInputService->list();
        return $this->httpResponseUtility->successResponse(InputTypeResource::collection($result));
    }
}
