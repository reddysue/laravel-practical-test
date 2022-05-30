<?php
namespace App\Services;

use App\Exceptions\NotFoundException;
use App\Repositories\AuthUserRepository;

class AuthService
{
    protected $authUserRepo;

    public function __construct(AuthUserRepository $authUserRepo)
    {
        $this->authUserRepo = $authUserRepo;
    }

    public function register($request)
    {
        $data = $this->authUserRepo->checkAlreadyRegister($request->email);
        if ($data) {
            $result['isRegister'] = true;
            $result['message'] = config('message.alreadyRegister');
        } else{
            $this->authUserRepo->createUser($request);
            $result['isRegister'] = false;
            $result['message']  = config('message.successRegister');
        }
        return $result;
    }

    public function login($request)
    {
        $user = $this->authUserRepo->checkAlreadyRegister($request->email);
        if (!$user) {
            throw new NotFoundException(config('message.notFoundMsg'));
        }

        $result = $this->authUserRepo->login($request, $user);
        if (!$result) {
            throw new NotFoundException(config('message.invalidCredential'));
        }

        return $result;
    }
}
