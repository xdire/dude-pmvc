<?php use Xdire\Dude\Core\App;

$middleware = new \App\Middleware\ExampleMiddleware();
/** ------------------- DEFINE ROUTING BELOW ---------------------- */

App::Route(ROUTE_ALL,'/',function ($req,$res) {

    // Route Controller
    App::routeNextController(new \App\Controller\ExampleController(),$req,$res);

    // Use Controller
    App::useController(new \App\Controller\ExampleController());

    // Flush
    $res->flush();

    // Send response
    $res->send(200,"<br>Hello World!");

},$middleware);
