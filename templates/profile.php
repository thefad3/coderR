<?
$data = $returnedData;
$loggedUser = $_SESSION['uid'];
$userData = new userp();
$loggedData = $userData->getUser($loggedUser);
$dataLoggedin = $loggedData[0];

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
        <?
        if(!empty($_SESSION['dpost'])){

            echo '<div class="alert alert-danger" role="alert">You have Sucessfully Deleted your codeR :( <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button></div>';
            unset($_SESSION['dpost']);
        }else{

        }
        ?>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6"><h4>Welcome to <? var_dump($data[0]); ?> Profile</h4></div>
            <div class="col-md-3"></div>
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
        <div>
        '; ?>
        <?
            if($_SESSION['uid'] == $posterName[0]['id']){
                echo'
                <form action="/delete/'.$key["id"].'/'.$key["poster_id"].'" method="post" enctype="multipart/form-data">
                <a href="" class="btn btn-danger"><span class="glyphicon glyphicon-edit"></span> Comment</a>
                <input type="submit" class="right btn btn-primary" value="Delete">
                </form>
                ';
            }else{
            }
 ?>

            <?
            echo'</div></div>';
            echo '<div class="col-md-3"></div>';
            echo '</div>';

        }
        ?>
    </div>
