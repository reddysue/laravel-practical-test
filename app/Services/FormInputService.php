<?php
namespace App\Services;

use App\Exceptions\NotFoundException;
use App\Repositories\FormInputRepository;

class FormInputService
{
    protected $formInputRepo;

    public function __construct(FormInputRepository $formInputRepo)
    {
        $this->formInputRepo = $formInputRepo;
    }

    public function add($request)
    {
        $data = [];
        $data['user_id']= auth()->id();
        $data['name']= $request->name;
        return $this->formInputRepo->create($data);
    }

    public function list()
    {
        return $this->formInputRepo->getListByAuthUser(auth()->id());
    }
}
