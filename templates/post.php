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
<nav>
    <ul class="left">
        <li><a href="/"> Home </a></li>
    </ul>
    <ul class="right">
        <li><? echo 'Welcome back, ', $metaData[0]['username']; ?> - </li>
        <li><a href="/logout">Logout</a></li>
    </ul>
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
                    <input type="submit" class="btn btn-primary"> <a class="btn btn-default" href="/">Cancel</a>
                    </div>
                </form>
            </div>
    <div class="col-md-2"></div>
</div>
</div>