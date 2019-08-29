<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UserCollection;
use Symfony\Component\HttpFoundation\Response;
use Auth;


class UserController extends Controller
{


   
    public function index()
    {
        return  UserCollection::collection(User::paginate(3));
        // return  collection(User::paginate(3));
    }



  
    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($request->password);
        $user  = User::create($data);
        $accessToken = $user->createToken('authToken')->accessToken;
        return response(['user'=>$user,'accessToken'=>$accessToken],Response::HTTP_CREATED);
    }

 
    public function show(Product $product)
    {
        // return $product;
        // return new ProductResource($product);
    }

    public function edit(Product $product)
    {
        
    }

  
    public function update(ProductRequest $request, Product $product)
    {
        // $this->productUserCheck($product);
        // $request['detail']  = $request->description;
        // unset($request['description']);
        // $product->update($request->all());

        // return response([
        //     'data' => new ProductResource($product),
        // ],Response::HTTP_CREATED);
    }



    public function getUserProducts(User $user)
    {
        return $user;
    }





    public function login(Request $request)
    {
        $loginData = $request->validate([

            'email' => 'required|string|max:50',
            'password' => 'required|string|max:50'
        ]);

        

        if(auth()->attempt($loginData))
        {
            $user = User::where('email',$request->email)->first();
            $accessToken = $user->createToken('authToken')->accessToken;


            return response([
            'data' => new UserResource($user),
            'accessToken'=>$accessToken
            ],Response::HTTP_CREATED);
        }
    }








}
