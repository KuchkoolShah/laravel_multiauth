<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class EditorAuthenticate extends Middleware
{
    protected function authenticate($request, array $guards)
    {
        if ($this->auth->guard('editor')->check()) {
            return $this->auth->shouldUse('editor');
        }
        $this->unauthenticated($request, ['editor']);
    }
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('editor.login');
        }
    }
}
