<?php
/**
 * Created by PhpStorm.
 * User: chrismac
 * Date: 3/17/15
 * Time: 11:14 AM
 */

class userReg {
    public function addUser($username='', $password='')
    {
        $dbc = new PDO("mysql:host=localhost;dbname=asl;port=8889", "root", "root");

        $qry = $dbc->prepare("insert into users (username, password) values(:username, :password)");

        $qry->execute(array(":username" => $username, ":password" => $password));
    }
};