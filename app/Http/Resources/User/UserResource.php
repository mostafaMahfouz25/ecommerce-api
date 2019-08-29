<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'products' => $this->products->count() > 0 ? $this->products->count() : 'Not Posting Products Yet',
            'href'=> [
                'products'=>route('get.user.products',$this->id)
            ],
        ];
    }
}
