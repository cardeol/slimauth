<?php

require_once dirname(__FILE__) . '/../bootstrap.php';

$app->get('/', function () use ($app, $log) {
        echo "<h1>Hello, Interface Pública</h1>";
    }
);

ECHO("TEST");

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