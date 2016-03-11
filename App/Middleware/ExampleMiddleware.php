<?php namespace App\Middleware;

use Xdire\Dude\Core\Face\Middleware;
use Xdire\Dude\Core\Server\Request;
use Xdire\Dude\Core\Server\Response;

class ExampleMiddleware implements Middleware
{
    public function start(Request &$request, Response &$response)
    {
        echo "<br> Hello from Middleware";
        $response->flush();
    }

}