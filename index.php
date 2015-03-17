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

$app->post('/sua', function() use ($app){

    include('class/addUser.php');
    $signup = new addUser();

    $allPostVars = $app->request->post();
    $username = $allPostVars['username'];
    $password = $allPostVars['password'];

    $signup->addUser($username, sha1($password));
    if($signup) {
        $_SESSION['login'] = true;
    }
    $app->redirect('/signup', array());

});

$app->get('/logout', function() use ($app){

    session_destroy();
    $app->redirect('/');

});

$app->post('/login', function() use ($app) {
    include('class/login.php');
    $login = new login();

    $allPostVars = $app->request->post();
    $username = $allPostVars['username'];
    $password = $allPostVars['password'];

    $data = $login->checkLogin($username, sha1($password));

    if($data){
        //set session
        $_SESSION['id'] = $data[0]['id'];
        $_SESSION['login'] = true;
        $app->render('login.php');

    }else{

        $app->redirect('/');
        //session
        $_SESSION['login'] = false;

    }
});







$app->run();
?>


