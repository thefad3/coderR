<?php
/**
 * Created by PhpStorm.
 * User: chrismac
 * Date: 3/16/15
 * Time: 10:55 AM
 */
session_start();
require 'vendor/autoload.php';
$app = new \Slim\Slim();
$view = $app->view();


$app->get('/', function () use ($app) {
    $app->render('home.php');
});

$app->get('/signup', function () use ($app) {
    $app->render('register.php');
});



$app->post('/login', function() use ($app) {
    include('class/login.php');
    $login = new login();

    $allPostVars = $app->request->post();
    $username = $allPostVars['username'];
    $password = $allPostVars['password'];

    $data = $login->checkLogin($username, $password);

    if($data){

        //set session
        $_SESSION['login'] = true;
        $app->render('login.php', array('username'=>$username, 'password'=>$password));

    }else{

        $app->redirect('/');
        //session
        $_SESSION['login'] = false;

    }
});







$app->run();


?>


