<?php

$config['db'] = array(
    'driver'    => 'sqlite',
    'host'      => '127.0.0.1',
    'database'  => __DIR__.'/data/database.sqlite3',
    'charset'   => 'utf8',
    'collation' => 'utf8_general_ci'    
);


$config['app']['log.writer'] =  new \Slim\Extras\Log\DateTimeFileWriter(array(
    'path' => realpath(__DIR__.DIRECTORY_SEPARATOR.'logs'),
    'name_format' => 'Y-m-d',
    'message_format' => '%label% - %date% - %message%'
));


