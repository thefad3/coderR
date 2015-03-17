<nav>
    <ul>
        <li><a href="/"> Home </a></li>
        <li><a href="/logout">Logout</a></li>
    </ul>
</nav>
<div class="container-fluid">

<?php
$uid = $_SESSION['uid'];
$userData = new userp();


$metaData = $userData->getUser($uid);
/**
 * Created by PhpStorm.
 * User: chrismac
 * Date: 3/17/15
 * Time: 1:20 PM
 */



echo '<h3>This is the protected page!</h3>';
echo 'Welcome back, ', $metaData[0]['username'];



?>
    </div>

