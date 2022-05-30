<?php

namespace App\Http\Resources;

use Illuminate\Support\Str;
use Illuminate\Http\Resources\Json\JsonResource;

class InputTypeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'label' =>$this->name,
            'type' =>$this->type,
            'name' => Str::camel($this->name),
        ];
    }
}