<?php

require_once dirname(__FILE__) . '/../bootstrap.php';

$app->add(new \Slim\Middleware\JwtAuthentication([
    "secret" => "supersecretkeyyoushouldnotcommittogithub"
]));

if (!function_exists('getallheaders')) 
{ 
    function getallheaders() 
    { 
           $headers = ''; 
       foreach ($_SERVER as $name => $value) 
       { 
           if (substr($name, 0, 5) == 'HTTP_') 
           { 
               $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value; 
           } 
       } 
       return $headers; 
    } 
} 



$app->get('/', function () use ($app, $log) {
        echo "<h1>Hello, Interface Pública</h1>";
    }
);


echo("TESTING");


/*
// Custom 404 error
$app->notFound(function () use ($app) {

    $mediaType = $app->request->getMediaType();

    $isAPI = (bool) preg_match('/\/api\/v.*$/', $app->request->getPath());

    if ('application/json' === $mediaType || true === $isAPI) {

        $app->response->headers->set(
            'Content-Type',
            'application/json'
        );

        echo json_encode(
            array(
                'code' => 404,
                'message' => 'Not found'
            ),
            JSON_PRETTY_PRINT
        );

    } else {
        echo '<html>
                <head><title>404 Page Not Found</title></head>
                <body>
                    <h1>404 Page Not Found</h1>
                    <p>The page you are looking for could not be found.</p>
                </body>
              </html>';
    }
});

*/

$app->run();


?>