<?
$data = $returnedData[0];
$uid = $data['poster_id'];
$loggedUser = $_SESSION['uid'];
$userData = new userp();
$comments = new getComments();
$userComments = $comments->findComments($postingID);


$viewData = $userData->getUser($uid);
$loggedData = $userData->getUser($loggedUser);
$dataLoggedin = $loggedData[0];
$dataUser = $viewData[0];


?>
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: "textarea"
    });
</script>
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
<?php

echo '<div class="row"><div class="col-md-3"></div>';
echo'<div class="col-md-6 transParent">
            <h3>Edit <small>Change your code here</small></h3>
            <hr width="100%">
            <form method="post" enctype="multipart/form-data" action="/edit/'.$data['id'].'/">
            <div class="form-group">
                    <label>Title of Your codeR:</label><br>
                    <input type="text" name="name" class="form-control" value="'.$data['title'].'" disabled>
                    </div>
                    <div class="form-group">
                    <label>Description:</label><br>
                    <input type="text" name="desc" value="'.$data['desc'].'" class="form-control">
            </div>
            <div class="form-group">
            <textarea name="code" required>
                    ' . $data['code'] .'
            </textarea>
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok-circle"></span> Update Code</button> <a class="btn btn-default" href="/"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</a>
            </div>
            </form>' ?>

<?
echo'</div>';
echo '<div class="col-md-3"></div></div>'

?>
        </div>