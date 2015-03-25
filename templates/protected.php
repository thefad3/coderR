<?
$_SESSION['uid'] = $uid;
include('class/post.php');
require('class/userp.php');
$fetchA = new post();
$posts = $fetchA->fetchAction();
$userData = new userp();
$metaData = $userData->getUser($uid);

?>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">

    <div class="navbar-header">
    <a class="navbar-brand" href="/"><span class="glyphicon glyphicon-tasks"></span> <b>codeR</b> - Design, Develop, Share</a>
    </div>

    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">My Account<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="profile/<? echo $metaData[0]['id']; ?>"><span class="glyphicon glyphicon-plus-sign"></span>  <? echo $metaData[0]['username']; ?></a></li>
                <li class="divider"></li>
                <li><a href="profile/<? echo $metaData[0]['id']; ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"> </span>View Profile</a></li>
                <li><a href="/post"><span class="glyphicon glyphicon-arrow-up" aria-hidden="true"> </span> Upload Code</a></li>
                <li><a href="/logout"><span class="glyphicon glyphicon-off" aria-hidden="true"> </span> Logout</a></li>
            </ul>
        </li>
    </ul>

    </div>
</nav>

<div class="container-fluid">
    <?
    if(!empty($_SESSION['newpost'])){

        echo '<div class="alert alert-danger" role="alert">You have Sucessfully Posted Your codeR!</div>';
        unset($_SESSION['newpost']);
    }else{

    }
    ?>


    <?php

    foreach($posts as $key){
        $posterName = $userData->getUser($key['poster_id']);
        echo '<div class="row"><div class="col-md-3"></div>';
        echo'
            <div class="col-md-6 contentBox">
            <b>'.$key['title'].'</b>
            <div class="right">Posted By: <a href="profile/'.$posterName[0]['id'].'">'.$posterName[0]['username'].'</a></div>

        <section class="codeBox">
                <code>
                    ' . $key['code'] .'
                </code>
        </section>
        <p></p>
        <div><a href="" class="btn btn-danger"><span class="glyphicon glyphicon-edit"></span> Comment</a> <a href="protected/'.$key['id'].'" class="btn btn-danger"><span class="glyphicon glyphicon-console"></span> View Code</a> <div class="fb-like btn btn-danger" data-href="http://localhost:8888/protected/'.$key['id'].'"  data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"><span class="glyphicon glyphicon-heart-empty"></span> Like</div></div>
        </div>';
        echo '<div class="col-md-3"></div></div>';
    }
    echo '</div>';
    ?>
</div>

