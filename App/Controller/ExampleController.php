<?php namespace App\Controller;

use Xdire\Dude\Core\Face\Controller;
use Xdire\Dude\Core\Face\RoutingController;
use Xdire\Dude\Core\Server\Request;
use Xdire\Dude\Core\Server\Response;

class ExampleController implements RoutingController,Controller
{
    public function acceptRoute(Request $request, Response $response)
    {
        $response->send(200,"<h1>Hello Dude!</h1><br>Route was accepted");
    }

    public function start($data = null)
    {
        echo "<br>Controller was executed";
    }

}