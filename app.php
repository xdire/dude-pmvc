<?php use Xdire\Dude\Core\App;

/** --------------------------------------------- /
 *          APPLICATION STARTING FILE             /
 *  ---------------------------------------------*/
/* ---------------------------------------------  \
|                                                 \
|       SWITCH ENVIRONMENT CONSTANT               \
|                                                 \
|       @values [dev], [prod]                     \
|                                                 \
------------------------------------------------ */
define('APPENVIRONMENT','dev');
// ---------------------------------------------  \
//      DEFINE CURRENT SERVER TIME ZONE           \
// ---------------------------------------------  \
date_default_timezone_set("America/New_York");
/* ---------------------------------------------  \
|                                                 \
|       REQUIRE COMPOSER AUTOLOAD LIB             \
|                                                 \
------------------------------------------------ */
require_once __DIR__ . '/vendor/autoload.php';


/* ---------------------------------------------  \
|                                                 \
|       APPLICATION RELATED OPTIONS               \
|                                                 \
------------------------------------------------ */

// SET APPLICATION ROOT PATH
chdir(dirname(__FILE__));
define('ROOTPATH',getcwd());
define('APPPATH',ROOTPATH.'/App');

// Feed Core with Application structure files
App::feedAppRouteFile(APPPATH."/route.php");
App::feedAppProcessFile(APPPATH."/process.php");

// Switch environment properties and config zones
$config = null;
if (APPENVIRONMENT=='prod') { error_reporting(0);
    require(APPPATH.'/config.prod.php');
    $config = applicationConfig();
} elseif(APPENVIRONMENT=='dev') { error_reporting(-1);
    require(APPPATH . '/config.dev.php');
    $config = applicationConfig();
} elseif(APPENVIRONMENT=='test') { error_reporting(-1);
    require(APPPATH.'/config.test.php');
    $config = applicationConfig();
} else {
    throw new \Exception('Environment parameter is wrong');
}
require(APPPATH.'/const.php');
// STARTING CORE
App::init($config);