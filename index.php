<?php
/**
 * Created by PhpStorm.
 * User: chrismac
 * Date: 3/16/15
 * Time: 10:55 AM
 */

require 'vendor/autoload.php';
$app = new \Slim\Slim();
$view = $app->view();

$app->get('/:id', function ($id) use ($app) {
    $app->render('home.php', array('id' => $id));
});



/*
$app->get('/', function() use ($app) {
    $app->render('/index.php');
})->name('index');
*/





$app->run();


?>


