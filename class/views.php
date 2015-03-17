<?php
/**
 * Created by PhpStorm.
 * User: chrismac
 * Date: 3/16/15
 * Time: 10:55 AM
 */

$sql = new PDO("mysql:host=localhost;dbname=ssl;port=8889", "root", "root");
$sqlQuery = $sql->prepare("select * from users");

$sqlQuery->execute();

$results = $sqlQuery->fetchAll();

$res = $results[0]['username'];

echo $res;


?>