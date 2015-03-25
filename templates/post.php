<?php
/**
 * Created by PhpStorm.
 * User: chrismac
 * Date: 3/23/15
 * Time: 12:39 PM
 */
include('class/post.php');
require('class/userp.php');
$uid = $_SESSION['uid'];
$userData = new userp();
$metaData = $userData->getUser($uid);

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
            <a class="<span class="glyphicon glyphicon-tasks"></span> " href="/"><span class="glyphicon glyphicon-tasks"></span>  <b>codeR</b> - Design, Develop, Share</a>
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
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
            <div class="col-md-8 posterBox">
                <form action="/postAction" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                    <label>Title of Your codeR:</label><br>
                    <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                    <label>Description:</label><br>
                    <input type="text" name="desc" class="form-control">
                    </div>
                    <div class="form-group">
                    <label>Paste your Code here (PHP, jQuery, HTML, CSS):</label>
                    <textarea name="code"></textarea>
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok-circle"></span> Post Code</button> <a class="btn btn-default" href="/"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</a>
                    </div>
                </form>
            </div>
    <div class="col-md-2"></div>
</div>
</div>