<?php

namespace App\Exceptions;

use Exception;
use Defender;
use Illuminate\Support\Facades\Auth;
use Artesaos\Defender\Exceptions\ForbiddenException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        HttpException::class,
        ModelNotFoundException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
//        verifica se o usuario logado pertence ao grupo cliente, caso tente acessar rotas do admin sera redirecionado para o login
        if($e instanceof ForbiddenException){
            if(Defender::hasRole('Usuario')){
                Auth::logout();
                return redirect()->route('admin');
            }
            return response('Acesso Negado', 403);
        }
        
        if ($e instanceof ModelNotFoundException) {
            $e = new NotFoundHttpException($e->getMessage(), $e);
        }

        return parent::render($request, $e);
        
        
        
    }
}
