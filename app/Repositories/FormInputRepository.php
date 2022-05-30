<?php
namespace App\Repositories;

use App\Models\UserFormInput;

class FormInputRepository extends BaseRepository
{
    Protected $model;

    public function __construct(UserFormInput $model)
    {
        $this->model = $model;
    }

    public function getListByAuthUser($userId)
    {
        return $this->model->where('user_id', $userId)->get();
    }
}
