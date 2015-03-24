<?
include('class/post.php');
require('class/userp.php');
$fetchA = new post();
$posts = $fetchA->fetchAction();
?>
<nav>
    <ul>
        <li><a href="/"> Home </a></li>
        <li><a href="" data-toggle="modal" data-target="#myModal"> Login </a></li>
        <li><a href="#" data-toggle="modal" data-target="#myModalWindow"> Sign Up </a></li>
    </ul>
</nav>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content modalBorder">
            <p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
            </p>
            <? if(!isset($_SESSION['islo'])){
                echo"<blockquote><p class='bg-primary'>Login with your username and password below</p></blockquote>";

            }else{
                echo "<blockquote><p class='bg-danger'>Sorry your login was incorrect, try again</p></blockquote>";
            } ?>
            <form action="/login"  enctype="multipart/form-data" method="post">
                <div class="form-group formModal"><blockquote>
                <label>Username:</label>
                <input name="username" type="text">
                </blockquote></div>
                <div class="form-group formModal"><blockquote>
                <label>Password:</label>
                <input name="password" type="password">
                </blockquote></div>
                <div class="form-group">
                <input type="submit" value="Login" class="btn btn-default">

                </div>
            </form>
            <p class='bg-success text-color'><a href="#" data-toggle="modal" data-target="#myModalWindow">Don't have an account? Register here!</a></p>

        </div>
        </div>
    </div>
<div class="modal fade" id="myModalWindow" tabindex="-1" role="dialog" aria-labelledby="myModalWindow" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content modalBorder">
            <form action="/sua"  enctype="multipart/form-data" method="post">
                <label>Username:</label>
                <input name="username" type="text">
                <label>Password:</label>
                <input name="password" type="password">
                <input type="submit">
            </form>
        </div>
    </div>
</div>

<div class="container-fluid">
<h3>codeR</h3>
    <?

    $userData = new userp();

    foreach($posts as $key){
        $posterName = $userData->getUser($key['poster_id']);
        echo '<div class="row"><div class="col-md-4"></div>';

        echo'
            <div class="col-md-4 contentBox">
            <b>'.$key['title'].'</b>
            <div class="right">'.$posterName[0]['username'].'</div>
        <section>
            <code class="col-md-12 codeBox">
                    ' . $key['code'] .'
            </code>
        </section>
        </div>';
        echo '<div class="col-md-4"></div>';
        echo '</div>';
    }

    ?>
</div>


