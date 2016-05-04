# dude!
PHP micro-framework (5.5+ / 7+)

# Installation: through Composer

1) Install Composer to desired folder from https://getcomposer.org/download/

2) execute next command (assuming that you installed Composer into folder as phar file)
```text
php composer.phar create-project xdire/dude-pmvc myapp
```
myapp folder will be created in your desired folder
```text
mv composer.phar myapp
cd myapp
```
execute composer update
```text
php composer.phar update
```
done

# Installation: Linking to Web Server

#### Folder structure of Application will look like below
```text
myapp
--|
  |- App
  |- Drivers
  |- public
  |- vendor
```

#### Create new Virtual Host in your Web-Server

Point Virtual Host root to `/somepath/myapp/public`

##### Apache Virtual Host Directive
```text
<Directory "/somepath/myapp/public">
    AllowOverride None
    Require all granted
    <IfModule mod_rewrite.c>
      RewriteEngine On
      RewriteBase /
      RewriteRule ^index\.php$ - [L]
      RewriteCond %{REQUEST_FILENAME} !-f
      RewriteCond %{REQUEST_FILENAME} !-d
      RewriteRule . /index.php
    </IfModule>
</Directory>
<VirtualHost *:80>
   ServerName someserver.domain
   DocumentRoot "/somepath/myapp/public"
</VirtualHost>
```

##### Nginx - Server Directive
```text
server {
    listen	 80;
    server_name  localhost;

	location / {
                if (!-e $request_filename) {
                    rewrite (.*)$ /index.php last;
                }
        }

	root   /somepath/myapp/public;
    index  index.php index.html index.htm;

    location ~ \.php$ {
        fastcgi_param   APPENVIRONMENT  prod;
        fastcgi_pass    unix:/var/run/php-fpm/php-fpm.sock;
        fastcgi_index   index.php;
        fastcgi_param   SCRIPT_FILENAME /somepath/myapp/public$fastcgi_script_name;
        include fastcgi_params;
    }

}

```

# After installation
#### Simple way
Define some route in `/AppFolder/App/route.php`
```php
App::route(ROUTE_ALL,'/',function ($req,$resp) {
    echo "Hello world";
});
```
And after go to your server `http://your_server/`

#### Complex way
1 Define some controller in the `/App/Controller` folder
```php
namespace App\Controller;
use Xdire\Dude\Core\Face\RoutingController;
use Xdire\Dude\Server\Request;
use Xdire\Dude\Server\Response;

class ExampleController implements RoutingController
{
  public function acceptRoute(Request $request, Response $response)
  {
  	$response->send(200,"<h2>Hey Dude!</h2>Route was accepted");
  }
}

```

2 Define controller route in `/AppFolder/App/route.php`

Route example for every type of request
```php
App::route(ROUTE_ALL,'/',function ($req,$resp) {
    App::routeController('ExampleController@testRoute',$req,$resp);
});
```

Route example for GET only Request
```php
App::route(ROUTE_GET,'/',function ($req,$resp) {
    App::routeController('ExampleController@testRoute',$req,$resp);
});
```

Route example for POST only Request
```php
App::route(ROUTE_POST,'/',function ($req,$resp) {
    App::routeController('ExampleController@testRoute',$req,$resp);
});
```

Types of request which is supported
```text
ROUTE_ALL
ROUTE_GET
ROUTE_POST
ROUTE_UPD
ROUTE_DEL
ROUTE_PUT
ROUTE_OPT
```

3 Middleware support
4 CORS Middleware support
