<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class CommentsForbiddenWords
{
    protected $forbidden = [
        'Perferendis',
        'excepturi',
    ];
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        foreach ($this->forbidden as $word) {
            $request->merge([
                'name' => Str::replace($word,'****',$request->input('name')),
                'content' => Str::replace($word,'****',$request->input('content')),
            ]);
        }
        return $next($request);
    }
}
