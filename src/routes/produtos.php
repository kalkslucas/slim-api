<?php

use App\Models\Produto;
use Slim\App;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

//Rotas para produtos

/*
ORM -> Object Relational Mapper (Mapeador de objeto relacional)
Illuminate -> Base de dados do Laravel sem o Laravel
Eloquent ORM
*/

/** @var App $app  */
$app->group('/api/v1', function (App $app) {
  $this->get('/produtos/lista', function (Request $request, Response $response) {
    $produtos = Produto::all();
    $response->getBody()->write($produtos->toJson());
    return $response->withHeader('Content-Type', 'application/json');
  });
});
