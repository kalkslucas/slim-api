<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

//Routes
return function (App $app) {
    require __DIR__ . '/routes/produtos.php';
};
