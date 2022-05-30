<?php
namespace App\Repositories;

use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthUserRepository extends BaseRepository
{
    Protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function checkAlreadyRegister($email)
    {
        return $this->model->where('email', $email)->first();
    }

    public function createUser($request)
    {
        return $this->model->create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password)
        ]);
    }

    public function login($request, $user)
    {
        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (!$token = Auth::attempt($login)) {
            return false;
        }

        return ['data' => $user, 'token' => $user->createToken('User-Token')->plainTextToken];
    }
}
