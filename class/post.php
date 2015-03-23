<?php
/**
 * Created by PhpStorm.
 * User: chrismac
 * Date: 3/17/15
 * Time: 1:46 PM
 */

class post {
    public function fetchAction(){
        $dbc = new PDO("mysql:host=localhost;dbname=asl;port=8889", "root", "root");

        $sqlQ = $dbc->prepare("select * from posts");

        $sqlQ->execute();

        $result = $sqlQ->fetchAll();
        return $result;

    }

    public function postAction(){
        $dbc = new PDO("mysql:host=localhost;dbname=asl;port=8889", "root", "root");

        $sqlQ = $dbc->prepare("select * from posts");

        $sqlQ->execute();

        $result = $sqlQ->fetchAll();
        return $result;

    }
}