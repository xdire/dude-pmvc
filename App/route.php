<?php use Xdire\Dude\Core\App; use Xdire\Dude\Core\Server\Request; use Xdire\Dude\Core\Server\Response;


/** -------------------------------------- DEFINE MIDDLEWARE CONTROLLERS ------------------------------------------ */

$middleware = new \App\Middleware\ExampleMiddleware();



/** ------------------------------------------ DEFINE ROUTING BELOW ----------------------------------------------- */

// ROUTE EXAMPLE 1 - With Routing Controller
App::route(ROUTE_ALL,'/',function (Request $req, Response $res) {

    // Route to Controller
    App::routeNextController(new \App\Controller\ExampleController(),$req,$res);

}, $middleware);


// ROUTE EXAMPLE 2 - With Calling Specific Controller
App::route(ROUTE_ALL,'/test/*variable1/*variable2/*variable3',function(Request $req, Response $res) {

    // Send response from Route
    $res->send(200,"<h1>Hello World!</h1>");

    echo "<br> I am variable 1: ".$req->getPathParameter('variable1');
    echo "<br> I am variable 2: ".$req->getPathParameter('variable2');
    echo "<br> I am variable 3: ".$req->getPathParameter('variable3');

    // Use some Controller
    App::useController(new \App\Controller\ExampleController());

    // Flush all echoed data, if needed. Response object contains flush() ,send() and end() methods
    $res->flush();

}, $middleware);



// ROUTE EXAMPLE 3 - Same test route but without parameters
App::route(ROUTE_ALL,'/test',function(Request $req, Response $res) {

    // Send response from Route
    $res->send(200,"<h1>Hello World!</h1>");

}, $middleware);



