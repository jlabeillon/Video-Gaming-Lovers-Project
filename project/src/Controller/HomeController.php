<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class HomeController

{
    public function home()
    {
        return new Response('<html><body>Hello World !</body>');
    }
}