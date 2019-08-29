<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
                'name'=> 'required|unique:products',
                'description'=> 'required|max:5000',
                'price'=> 'required|max:10',
                'stock'=> 'required|max:6',
                'discount'=> 'required:max:2',
            ];
            break;


            // Editing data 
            case 'PUT':
            return [
                'name'=> 'required|unique:products',
                'description'=> 'required|max:5000',
                'price'=> 'required|max:10',
                'stock'=> 'required|max:6',
                'discount'=> 'required:max:2',
            ];
            break;



        }
    }
}
