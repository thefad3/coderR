<?
$_SESSION['uid'] = $uid;
include('class/post.php');
require('class/userp.php');
$fetchA = new post();
$posts = $fetchA->fetchAction();
$userData = new userp();
$metaData = $userData->getUser($uid);

?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=374221646036056&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
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
        $posterName = $userData->getUser($key['poster_id']);

        echo'
            <div class="col-md-4 contentBox">
            <b>'.$key['title'].'</b>
            <div class="right">'.$posterName[0]['username'].'</div>
        <section>
            <code class="col-md-12 codeBox">
                    ' . $key['code'] .'
            </code>
        </section>
        <div>Comment - <a href="protected/'.$key['id'].'">View</a>- <div class="fb-like" data-href="" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div></div>
        </div>';
    }
    echo '</div>';

    ?>
</div>

