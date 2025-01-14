<?php

namespace App\Http\Middleware;

use App\Models\LogAcesso;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // request - manipular
        //return $next($request);
        // response - manipular

        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log' => "$ip xyz requisitou a rota $rota"]);
        
        //return Response('Chegamos no middleware e finalizamos no próprio middleware');
        //return $next($request);

        $resposta = $next($request);

        $resposta->setStatusCode(201, 'O status da resposta e o texto da resposta foram modificados');

        return $resposta;
    }
}
