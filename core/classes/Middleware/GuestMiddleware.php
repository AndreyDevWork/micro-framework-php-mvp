<?php

namespace Core\Middleware;

class GuestMiddleware
{
    public function handle()
    {
        if(check_auth()) {
            redirect('/');
        }
    }
}
