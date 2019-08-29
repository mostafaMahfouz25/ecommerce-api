<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        switch ($this->method()) 
        {
            // adding data 

            case 'POST':
            return [
                'name'=> 'required|string|max:100',
                'email'=> 'required|unique:users|max:100',
                'password'=> 'required|string|min:6|max:30',
                'confirm_password'=> 'required|string|min:6|max:30|same:password',
            ];
            break;


            // Editing data 
            case 'PUT':
            return [
                'name'=> 'required|string|max:100',
                'email'=> 'required|unique:users|max:100',
                'password'=> 'required|string|min:6|max:30',
                'confirm_password'=> 'required|string|min:6|max:30|same:password',
            ];
            break;



        }
    }
}
