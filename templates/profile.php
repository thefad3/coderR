<?
$data = $returnedData;
$loggedUser = $_SESSION['uid'];
$userData = new userp();
$loggedData = $userData->getUser($loggedUser);
$dataLoggedin = $loggedData[0];

$posterProfile = $userData->getUser($data[0]['poster_id']);


?>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">

        <div class="navbar-header">
            <a class="navbar-brand" href="/"><span class="glyphicon glyphicon-tasks"></span> <b>codeR</b></a>
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
            <div class="col-md-6 userTitle"><h4>Welcome to <? echo $posterProfile[0]['username'] ?>'s Profile</h4></div>
            <div class="col-md-3"></div>
        </div>
        <?php

        foreach($data as $key){
            $posterName = $userData->getUser($key['poster_id']);
            echo '<div class="row"><div class="col-md-3"></div>';
            echo'
            <div class="col-md-6 contentBox">
            <h2>'.$key['title'].' <small>'.$key['desc'].'</small></h2>

        <section class="codeBox">
                <blockquote>
                <code>
                    ' . $key['code'] .'
                </code>
                </blockquote>
        </section>
        <p></p>
        <div>
        '; ?>
        <?
            if($_SESSION['uid'] == $posterName[0]['id']){
                echo'
                <form action="/delete/'.$key["id"].'/'.$key["poster_id"].'"  method="post" enctype="multipart/form-data">
                <a href="/comments/'.$key['id'].'/'.$posterName[0]['id'].'" class="btn btn-danger"><span class="glyphicon glyphicon-edit"></span> Comment</a>
                <a href="/edit/'.$key['id'].'/'.$posterName[0]['id'].'" class="btn btn-danger"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                <input type="submit" class="right btn btn-primary" value="Delete">
                </form>
                ';
            }else{
                echo '<a href="/comments/'.$key['id'].'/'.$posterName[0]['id'].'" class="btn btn-danger"><span class="glyphicon glyphicon-edit"></span> Comment</a>';
            }
 ?>

            <?
            echo'</div></div>';
            echo '<div class="col-md-3"></div>';
            echo '</div>';

        }
        ?>
    </div>
