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

    if(!empty($_SESSION['islo'])){
        $app->redirect('/protected');

    }else{
        $app->render('header.php');
        $app->render('home.php');
        $app->render('footer.php');
    }
});

$app->get('/protected', function() use ($app){
    if(!empty($_SESSION['islo'])){
        $uid = $_SESSION['uid'];
        $app->render('header.php');
        $app->render('protected.php', array('uid'=>$uid));
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
    $signup = new userReg();

    $allPostVars = $app->request->post();

    $signup->addUser($allPostVars['username'], sha1($allPostVars['password']));

    $app->redirect('/');

});

$app->get('/logout', function() use ($app){
    session_destroy();
    $app->redirect('/');
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
        $_SESSION['islo'] = true;
        $app->redirect('/protected');
    }else{
        //session
        $_SESSION['islo'] = false;
        $app->redirect('/');

    }
});

$app->get('/post', function() use ($app){

    //This is where the posting will take action
    $app->render('header.php');
    $app->render('post.php');
});

$app->post('/postAction', function() use ($app){
    $uid = $_SESSION['uid'];
    include('class/post.php');
    $_SESSION['newpost'] = true;
    $postCode = new addPost();

    $varCalls = $app->request->post();

    $postCode->postAction($uid, $varCalls['name'], $varCalls['desc'], $varCalls['code']);
    //var_dump($varCalls, $uid);
    $app->redirect('/');
});

$app->get('/protected/:id', function($id) use ($app){

    include('class/post.php');
    require('class/userp.php');
    include('class/comments.php');

    $postData = new fetchPost();
    $returnedData = $postData->fetch($id);

    $app->render('viewsh.php');
    $app->render('viewpost.php', array('returnedData'=>$returnedData));
});

$app->get('/profile/:id', function($id) use ($app){

    $profileId = $id;
    include('class/profile.php');
    require('class/userp.php');

    $postData = new profile();
    $returnedData = $postData->fetchProfile($profileId);

    $app->render('viewsh.php');
    $app->render('profile.php', array('returnedData'=>$returnedData));

});

$app->post('/like/:uid/:pid', function($uid, $pid) use ($app){
    include('class/like.php');
    $likeData = new like();
    $sendLike = $likeData->likeCode($uid,$pid);
    var_dump($sendLike);
});
$app->post('/unlike/:uid/:pid', function($uid, $pid) use ($app){
    include('class/like.php');
    $unlikeData = new like();
    $sendLike = $unlikeData->unlikeCode($uid,$pid);
    var_dump($sendLike);
});
$app->get('/comments/:pid/:liu', function($pid, $liu) use ($app){
    include('class/profile.php');
    include('class/post.php');
    require('class/userp.php');
    include('class/comments.php');


    $userData = new profile();
    $userReturnedData = $userData->fetchProfile($liu);

    $postData = new fetchPost();
    $returnedData = $postData->fetch($pid);

    $app->render('viewsh.php');
    $app->render('comments.php', array(
        'returnedData'=>$returnedData,
        'userReturnedData'=>$userReturnedData,
        'postingID'=>$pid
    ));

});

$app->post('/addComment/:uid/:pid', function($uid,$pid) use ($app){

    include('class/comments.php');

    $commentsCalls = $app->request->post();
    //var_dump($commentsCalls);
    $commentPost = new addComments();
    $commentPost->postComment($uid, $commentsCalls['c'], $pid);
    $url = '/comments/'.$pid.'/'.$uid;
    $_SESSION['cpost'] = true;
    $app->redirect($url);

});

$app->post('/delete/:pid/:uid', function($pid, $uid) use ($app){
    include('class/post.php');
    $commentsCalls = $app->request->post();

    //var_dump($uid, $pid);
    $deletePost = new deletePost();
    $deletePost->deleteCode($pid);
    $url = '/profile/'.$uid;
    $_SESSION['dpost'] = true;
    $app->redirect($url);
});


$app->run();

?>


