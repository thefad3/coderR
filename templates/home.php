<? require('header.php') ?>
<nav>
    <ul>
        <li><a href="/"> Home </a></li>
        <li><a href="" data-toggle="modal" data-target="#myModal"> Login </a></li>
        <li><a href="/signup"> Sign Up </a></li>
    </ul>
</nav>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/login"  enctype="multipart/form-data" method="post">
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



<?php




echo'
<h3>codeR</h3>

    <div class="row">
        <div class="col-md-4 contentBox">
                <section>
                    <code class="codeBox col-md-12">

                    </code>
                </section>
        Yaoo
        </div>


        <div class="col-md-4"></div>
        <div class="col-md-4">.col-md-4</div>
    </div>

</div>'

?>

<? require('footer.php'); ?>