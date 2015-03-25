<?
$data = $returnedData;
$loggedUser = $_SESSION['uid'];
$userData = new userp();
$loggedData = $userData->getUser($loggedUser);
$dataLoggedin = $loggedData[0];
$contentLiked = false;

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
        <div class="row">
            <div class="col-md-12">Hello world</div>
        </div>
        <?php

        foreach($data as $key){
            $posterName = $userData->getUser($key['poster_id']);
            echo '<div class="row"><div class="col-md-3"></div>';
            echo'
            <div class="col-md-6 contentBox">
            <b>'.$key['title'].'</b>
            <div class="right">Posted By: <a href="/profile/'.$posterName[0]['id'].'">'.$posterName[0]['username'].'</a></div>

        <section class="codeBox">
                <code>
                    ' . $key['code'] .'
                </code>
        </section>
        <p></p>
        <div><a href="" class="btn btn-danger"><span class="glyphicon glyphicon-edit"></span> Comment</a>
        '; ?>
            <? if(!$contentLiked): ?>
                <a href="JavaScript:void(0);" uid="<? echo $loggedUser; ?>" rel="<? echo $posterName[0]['id'] ?>" class="likeButton status btn btn-danger"><span class="glyphicon glyphicon-heart-empty"></span> Like</a>
            <? else: ?>
                <a href="JavaScript:void(0);" uid="<? echo $loggedUser; ?>" rel="<? echo $posterName[0]['id'] ?>" class="status liked btn btn-danger unlikeButton"><span class="glyphicon glyphicon-heart-empty"></span> Unlike</a>
            <? endif ?>
            <?
            echo'</div></div>';
            echo '<div class="col-md-3"></div>';
            echo '</div>';

        }
        ?>
    </div>
