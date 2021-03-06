<?
$data = $returnedData[0];
$uid = $data['poster_id'];
$postingID = $data['id'];
$loggedUser = $_SESSION['uid'];
$userData = new userp();
$comments = new getComments();
$userComments = $comments->findComments($postingID);
$viewData = $userData->getUser($uid);
$loggedData = $userData->getUser($loggedUser);
$dataLoggedin = $loggedData[0];
$dataUser = $viewData[0];
?>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4f313bbf17f98fee" async="async"></script>

<nav class="navbar navbar-inverse">

    <div class="container-fluid">

        <div class="navbar-header">
            <a class="navbar-brand" href="/"><span class="glyphicon glyphicon-tasks"></span>  <b>codeR</b></a>
        </div>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">My Account<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"> </span> Home</a></li>
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
        <?
        if(!empty($_SESSION['upd'])){

            echo '<div class="alert alert-danger" role="alert">You have Updated your post!! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button></div>';
            unset($_SESSION['upd']);
        }else{

        }
        ?>
        <div class="row">
<?php

echo '<div class="col-md-3"></div>';
echo'<div class="col-md-6 transParent">
            <h2>'.$data['title'].' <small>'.$data['desc'].'</small></h2>
            <hr width="100%">
        <section class="col-md-12 codeView">
            <blockquote>
            <code>
                    ' . $data['code'] .'
            </code>
            </blockquote>
        </section>
        <hr width="100%">';
?>
        <div class="col-md-12 likeBox"><small>{ <a href="/profile/<? echo $data['poster_id'] ?>"><? echo $dataUser['username'] ?></a> }</span> <div class="addthis_sharing_toolbox right"></div></small></div>
        </div>
<? echo '<div class="col-md-3"></div>'

?>
        </div>


        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 commentPosts">
                <span class="glyphicon glyphicon-bullhorn"></span> <b>Comments</b>
                <hr width="100%">
                <?
                if(!$userComments){

                    echo '<div class="alert alert-info" role="alert">Sorry, there are no comments posted yet :(</div>';

                }
                foreach($userComments as $commentKey){
                    $viewCommentUser = $userData->getUser($commentKey['posterId']);
                    echo '<ul class="userPosts">';
                    echo '<li><span class="glyphicon glyphicon-user"></span> '.$viewCommentUser[0]['username'].':</li>';
                    echo '<li><div class="alert alert-success">'.htmlentities($commentKey['comments']).'</div></li>';
                    echo '</ul>';
                }

                ?>
                <div class="col-md-12 commentsBG">

                    <form method="post" enctype="multipart/form-data" action="/addComment/<? echo $dataLoggedin['id']; ?>/<? echo $data['id']; ?>">
                        <div class="form-group">
                            <label>Type Comment Here</label>

                            <textarea class="form-control" name="c"></textarea>
                        </div>

                        <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-ok-circle"></span> Add Comment</button> <a class="btn btn-default" href="/"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</a>
                    </form>
                </div>


            </div>
            <div class="col-md-3"></div>
        </div>
    </div>