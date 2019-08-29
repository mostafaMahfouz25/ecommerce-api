<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\Resource;


class UserCollection extends Resource
{
    
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'products' => $this->products->count() > 0 ? $this->products->count() : 'Not Posting Products Yet',
            'href'=> [
                'products'=>route('products.index',$this->id)
            ],
        ];
    }
}
