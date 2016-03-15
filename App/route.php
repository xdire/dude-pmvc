<?php use Xdire\Dude\Core\App;

$middleware = new \App\Middleware\ExampleMiddleware();
/** ------------------- DEFINE ROUTING BELOW ---------------------- */

// ROUTE EXAMPLE 1 - With Routing Controller
App::route(ROUTE_ALL,'/',function ($req,$res) {

    // Route to Controller
    App::routeNextController(new \App\Controller\ExampleController(),$req,$res);

},$middleware);

// ROUTE EXAMPLE 2 - With Calling Specific Controller
App::route(ROUTE_ALL,'/test',function($req,$res){
    // Use Controller
    App::useController(new \App\Controller\ExampleController());
    // Flush all echoed data, if needed. Response object contains flush() ,send() and end() methods
    $res->flush();
    // Send more response from Route
    $res->send(200,"<br>Hello World!");
});
