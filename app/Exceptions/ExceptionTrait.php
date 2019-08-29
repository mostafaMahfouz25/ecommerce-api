<?php 
namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;


trait ExceptionTrait 
{
    public function apiException($request,$e)
    {
        if($this->isModel($e))
        {
            
            return response()->json([
                'erros' => " Item Not Found. "
            ],Response::HTTP_NOT_FOUND);
        }



        if($this->isHttp($e))
        {
            
            return response()->json([
                'erros' => " Not Correct Route. "
            ],Response::HTTP_NOT_FOUND);
        }

        return parent::render($request, $e);
    }



    public function isModel($e)
    {
        return $e instanceof ModelNotFoundException;
    }


    public function isHttp($e)
    {
        return $e instanceof NotFoundHttpException;
    }



}