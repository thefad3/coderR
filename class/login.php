<?php
/**
 * Created by PhpStorm.
 * User: chrismac
 * Date: 3/17/15
 * Time: 11:00 AM
 */

class login{

    public function checkLogin($username="", $password="", $id=""){

        $dbc = new PDO("mysql:host=localhost;dbname=asl;port=8889", "root", "root");

        $sqlStatement = $dbc->prepare("select id, username, password from users where username = :username and password = :password");

        $sqlStatement->execute(array(":username"=>$username,
            ":password"=>$password));


        $result = $sqlStatement->fetchAll();
        return $result;


    }


}