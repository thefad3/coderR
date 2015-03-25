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
            <a class="navbar-brand" href="/"><b>codeR</b> - Design, Develop, Share</a>
        </div>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">My Account<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="/profile/<? echo $loggedUser ?>"><? echo $dataLoggedin['username']; ?></a></li>
                    <li class="divider"></li>
                    <li><a href="/profile/<? echo $loggedUser ?>">View Profile</a></li>
                    <li><a href="/post">Upload Code</a></li>
                    <li><a href="/logout">Logout</a></li>
                </ul>
            </li>
        </ul>

    </div>
</nav>

    <div class="container-fluid">
        <?php

        foreach($data as $key){
            $posterName = $userData->getUser($key['poster_id']);
            echo '<div class="row"><div class="col-md-3"></div>';
            echo'
            <div class="col-md-6 contentBox">
            <b>'.$key['title'].'</b>
            <div class="right"><a href="/profile/'.$posterName[0]['id'].'">'.$posterName[0]['username'].'</a></div>

        <section class="codeBox">
                <code>
                    ' . $key['code'] .'
                </code>
        </section>
        <p></p>
        <div><a href="" class="btn btn-primary">Comment</a> <a href="../protected/'.$key['id'].'" class="btn btn-primary">View Code</a></div>
        </div>';
            echo '<div class="col-md-3"></div></div>';
        }
        echo '</div>';
        ?>
    </div>
