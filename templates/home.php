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
        <li><a href="/signup"> Sign Up </a></li>
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
            <p class='bg-success text-color'><a href="/signup">Don't have an account? Register here!</a></p>

        </div>
        </div>
    </div>
<div class="container-fluid">
<h3>codeR</h3>
    <?
        echo '<div class="row">';
        foreach($posts as $key){
            echo'<div class="col-md-4 contentBox">
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


