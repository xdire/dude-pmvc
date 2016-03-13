<?php use Xdire\Dude\Core\App;

$middleware = new \App\Middleware\ExampleMiddleware();
/** ------------------- DEFINE ROUTING BELOW ---------------------- */

App::Route(ROUTE_ALL,'/',function ($req,$res) {

    // Route Controller
    App::routeNextController(new \App\Controller\ExampleController(),$req,$res);

    // Use Controller
    App::useController(new \App\Controller\ExampleController());

    // Flush all echoed data
    $res->flush();

    // Send more response from Route
    $res->send(200,"<br>Hello World!");

},$middleware);
