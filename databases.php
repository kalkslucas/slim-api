<?php

if (PHP_SAPI != 'cli') {
  exit('Rodar via CLI');
}

require __DIR__ . "/vendor/autoload.php";
//Instanciando o settings
$settings = require __DIR__ . "/src/settings.php";
$app = new \Slim\App($settings);

$dependencies = require __DIR__ . "/src/dependencies.php";
$dependencies($app);

$db = $app->getContainer()->get('db');

$schema = $db->schema();
$tabela = 'produtos';

$schema->dropIfExists($tabela);

$schema->create($tabela, function ($table) {
  $table->increments('id');
  $table->string('titulo', 100);
  $table->text('descricao');
  $table->double('preco', 11, 2);
  $table->string('fabricante', 60);
  $table->date('dt_criacao');
});

$db->table($tabela)->insert([
  'titulo' => 'PC GAMER',
  'descricao' => 'CPU AMD e GPU NVIDIA',
  'preco' => 3599.90,
  'fabricante' => 'PICHAU',
  'dt_criacao' => '2024-10-14'
]);
$db->table($tabela)->insert([
  'titulo' => 'iPhone',
  'descricao' => 'Celular TOP',
  'preco' => 7599.90,
  'fabricante' => 'Apple',
  'dt_criacao' => '2024-08-14'
]);
