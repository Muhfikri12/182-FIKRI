<?php

// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\Response;
// use Illuminate\Support\Facades\Auth;

// class LoginAccess
// {
//     /**
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \Closure  $next
//      * @param  mixed  ...$roles
//      * @return mixed
//      */
//     public function handle(Request $request, Closure $next, ...$roles): Response
//     {
//         $user = Auth::user();

//         if (!$user) {
//             return redirect()->route('login'); 
//         }

//         if (in_array($user->roles_id, $roles)) {
//             return $next($request);
//         }

//         return redirect()->route('main.main');
//     }
// }
