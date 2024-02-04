<?php

namespace Core\Middleware;

class AuthMiddleware
{
    public function handle()
    {
        if(!check_auth()) {
            redirect('/register');
        }
    }
}
