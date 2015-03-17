<html>
    <title>Hello World</title>
    <head>
        <script type="text/javascript" src="/bower_components/jquery-2.1.3.min/index.js"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/main.css">
        <script type="text/javascript" src="/js/main.js"></script>
    </head>
<body>

<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
    Launch demo modal
</button>

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

</body>
</html>