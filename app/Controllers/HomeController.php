<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Mail\Welcome;
use App\Models\User;
use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};

class HomeController extends Controller
{
    public function index(Request $request, Response $response, $args)
    {
        $user = new User;
        $user->name = 'Alex';
        $user->email = 'alex@codecourse.com';

        $this->c->mail->to($user->email, $user->name)->send(new Welcome($user));
    }
}
