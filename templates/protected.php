<?
include('class/post.php');
require('class/userp.php');
$fetchA = new post();
$posts = $fetchA->fetchAction();
$_SESSION['uid'] = $uid;
$userData = new userp();
$metaData = $userData->getUser($uid);
?>
<nav>
    <ul class="left">
        <li><a href="/"> Home </a></li>
    </ul>
    <ul class="right">
        <li><? echo 'Welcome back, ', $metaData[0]['username']; ?> - </li>
        <li><a href="/logout">Logout</a></li>
        <li><a href="/post">Upload Code</a></li>
    </ul>
</nav>
<div class="container-fluid">

<?php

echo '<h3>This is the protected page!</h3>';
echo '<div class="row">';
foreach($posts as $key){
    echo'
        <div class="col-md-4 contentBox">
        <h3>'.$key['title'].'</h3>
    <section>
        <code class="codeBox col-md-12">
                ' . htmlentities($key['code']) .'
        </code>
    </section>
    </div>';
}
echo '</div>';





?>
    </div>

