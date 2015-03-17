<?php
/**
 * Created by PhpStorm.
 * User: chrismac
 * Date: 3/17/15
 * Time: 10:49 AM
 */

echo'<h4>Hello you logged in?</h4>';
echo '<a href="/logout">Logout</a>'
?>

<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start(); echo'session started';}
?>