<?php
/**
 * Created by PhpStorm.
 * User: chrismac
 * Date: 3/17/15
 * Time: 11:14 AM
 */

class addUser {
    public function addUser($username='', $password='')
    {
        $dbh = new PDO("mysql:host=localhost;dbname=asl;port=8889", "root", "root");

        $stmnt = $dbh->prepare("insert into users (username, password) values(:username, :password)");

        $stmnt->execute(array(":username" => $username, ":password" => $password));
    }
};