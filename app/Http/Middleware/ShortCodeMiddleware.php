<?php

namespace App\Http\Middleware;

use App\Models\ShortCode;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShortCodeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);


        $html=$response->getContent();
        $html=str_replace('[[email]]','info@ku.lt', $html);
        $html=str_replace('[[address]]','H. Manto 84', $html);
        $response->setContent($html);


        return $response;
    }

}
