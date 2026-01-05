<?php

namespace App\Http\Middleware;

use Closure;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;

class JwtAuthenticate
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();

        if (! $token) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        try {
            $payload = JWT::decode(
                $token,
                new Key(config('jwt.public_key'), 'RS256')
            );

            $request->attributes->set('jwt', $payload);
        } catch (\Throwable $e) {
            return response()->json(['message' => 'Invalid token'], 401);
        }

        return $next($request);
    }
}

