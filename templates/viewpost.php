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
            <a class="navbar-brand" href="/"><b>codeR</b> - Design, Develop, Share</a>
        </div>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">My Account<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="profile/<? echo $loggedUser ?>"><? echo $dataLoggedin['username']; ?></a></li>
                    <li class="divider"></li>
                    <li><a href="profile/<? echo $loggedUser ?>">View Profile</a></li>
                    <li><a href="/post">Upload Code</a></li>
                    <li><a href="/logout">Logout</a></li>
                </ul>
            </li>
        </ul>

    </div>
</nav>

    <div class="container-fluid">
<?php

echo '<div class="col-md-3"></div>';
echo'<div class="col-md-6 codeModal">
            <b>'.$data['title'].'</b>
            <hr width="90%">
        <section>
            <code class="col-md-12 codeView">
                    ' . $data['code'] .'
            </code>
        </section>
        <div class="col-md-12 likeBox">Created By: ' .  $dataUser['username'] .'</div>
        </div>';
echo '<div class="col-md-3"></div>'

?>
        </div>
    </div>