<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()) {
            return null;

        } else {
            // Set the message in session
            session()->flash('error', 'Por favor faça login para continuar.');
            
            // Route to login page
            return route('login');
        }
    }
}