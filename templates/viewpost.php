<?php
/**
 * Created by PhpStorm.
 * User: chrismac
 * Date: 3/24/15
 * Time: 11:37 AM
 */

echo $returnedData[0]['title'];



?>

<nav>
    <ul class="left">
        <li><a href="/"> Home </a></li>
    </ul>
    <ul class="right">
        <li><? echo 'Welcome back, ' ?> - </li>
        <li><a href="/logout">Logout</a></li>
        <li><a href="/post">Upload Code</a></li>
    </ul>
</nav>