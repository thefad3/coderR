<?php
/**
 * Created by PhpStorm.
 * User: chrismac
 * Date: 3/16/15
 * Time: 10:55 AM
 */
session_cache_limiter(false);
session_start();

require 'vendor/autoload.php';
$app = new \Slim\Slim();
$view = $app->view();


$app->get('/', function() use ($app) {

    if(0 == 1){
        $app->redirect('/protected');


    }else if(0 == 0){
        $app->render('header.php');
        $app->render('home.php');
        $app->render('footer.php');

    }else{
        $app->render('header.php');
        $app->render('home.php');
        $app->render('footer.php');
    }
});

$app->get('/protected', function() use ($app){
        if(1 == 1){
        $app->render('header.php');
        $app->render('protected.php');
        $app->render('footer.php');

    }else{
        $app->redirect('/');
    }
    });

$app->get('/signup', function () use ($app) {
    $app->render('header.php');
    $app->render('register.php');
    $app->render('footer.php');

});

$app->post('/sua', function() use ($app){

    include('class/addUser.php');
    $signup = new addUser();

    $allPostVars = $app->request->post();

    $signup->addUser($allPostVars['username'], sha1($allPostVars['password']));

    $app->redirect('/');

});

$app->get('/logout', function() use ($app){
    $_SESSION['islo'] = 0;
    $app->render('header.php');
    $app->render('home.php');
    $app->render('footer.php');


});

$app->post('/login', function() use ($app) {
    include('class/login.php');
    require('class/userp.php');

    $login = new login();
    $allPostVars = $app->request->post();
    $data = $login->checkLogin($allPostVars['username'], sha1($allPostVars['password']));
    if($data){
        //set session
        $_SESSION['uid'] = $data[0]['id'];
        $_SESSION['islo'] = 1;
        $app->render('header.php');
        $app->render('protected.php');
        $app->render('footer.php');


    }else{

        $app->redirect('/');
        //session
        $_SESSION['islo'] = 0;

    }
});




$app->run();

?>


