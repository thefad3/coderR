<?
$data = $returnedData[0];
$uid = $data['poster_id'];
$loggedUser = $_SESSION['uid'];
$userData = new userp();
$viewData = $userData->getUser($uid);
$loggedData = $userData->getUser($loggedUser);
$dataLoggedin = $loggedData[0];
$dataUser = $viewData[0];
?>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">

        <div class="navbar-header">
            <a class="navbar-brand" href="/"><span class="glyphicon glyphicon-tasks"></span>  <b>codeR</b> - Design, Develop, Share</a>
        </div>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">My Account<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="/profile/<? echo $loggedUser ?>"><span class="glyphicon glyphicon-plus-sign"></span> <? echo $dataLoggedin['username']; ?></a></li>
                    <li class="divider"></li>
                    <li><a href="/profile/<? echo $loggedUser ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"> </span> View Profile</a></li>
                    <li><a href="/post"><span class="glyphicon glyphicon-arrow-up" aria-hidden="true"> </span> Upload Code</a></li>
                    <li><a href="/logout"><span class="glyphicon glyphicon-off" aria-hidden="true"> </span> Logout</a></li>
                </ul>
            </li>
        </ul>

    </div>
</nav>

    <div class="container-fluid">
<?php

echo '<div class="col-md-3"></div>';
echo'<div class="col-md-6 transParent">
            <b>'.$data['title'].'</b>
            <hr width="100%">
        <section class="col-md-12 codeView">
            <code>
                    ' . $data['code'] .'
            </code>
        </section>
        <div class="col-md-12 likeBox">Created By: ' .  $dataUser['username'] .'</div>
        </div>';
echo '<div class="col-md-3"></div>'

?>
        </div>
    </div>