<?php
/**
 * Created by PhpStorm.
 * User: chrismac
 * Date: 3/17/15
 * Time: 2:16 PM
 */

class userp {
    public function getUser($id='')
    {

        $dbc = new PDO("mysql:host=localhost;dbname=asl;port=8889", "root", "root");

        $sqlQ = $dbc->prepare("SELECT * FROM users where id = :id");

        $sqlQ->execute(array('id'=>$id));
        $result = $sqlQ->fetchAll();
        return $result;
    }

}
?>