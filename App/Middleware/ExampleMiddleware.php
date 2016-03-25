<?php namespace App\Middleware;

use Xdire\Dude\Core\Face\Middleware;
use Xdire\Dude\Core\Server\Request;
use Xdire\Dude\Core\Server\Response;
use Xdire\Dude\Core\User\User;

class ExampleMiddleware implements Middleware
{

    public function start(Request &$request, Response &$response, callable &$next)
    {
        // Don't echo anything from middleware left it to Controllers
        // write some functions which you want to be executed before
        // request reach Controllers

        // For example - prepare some User data for Controllers
        $user = new User();
        $user->setAuthorized();
        $request->__setUser($user);

        // Call next for continue code execution
        $next($request,$response);
    }

}