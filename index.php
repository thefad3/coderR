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


$app->get('/', function() use ($app) {
    session_start();

    if(!$_SESSION['islo']){
        $app->render('protected.php');
    }else{
        $app->render('home.php');
    }
});


$app->get('/signup', function () use ($app) {
    $app->render('register.php');
});

$app->post('/sua', function() use ($app){

    include('class/addUser.php');
    $signup = new addUser();

    $allPostVars = $app->request->post();

    $signup->addUser($allPostVars['username'], sha1($allPostVars['password']));
    if($signup) {
        $_SESSION['islo'];
    }
    $app->redirect('/');

});

$app->get('/logout', function() use ($app){
    session_destroy();
    $app->redirect('/');

});

$app->post('/login', function() use ($app) {
    session_start();
    include('class/login.php');
    $login = new login();
    $allPostVars = $app->request->post();
    $data = $login->checkLogin($allPostVars['username'], sha1($allPostVars['password']));
    if($data){
        //set session
        $_SESSION['islo'];
        $app->redirect('/');

    }else{

        $app->redirect('/');
        //session
        $_SESSION['islo'] = false;

    }
});




$app->run();

?>


