<?php
/**
 * Created by PhpStorm.
 * User: chrismac
 * Date: 3/25/15
 * Time: 2:02 PM
 */

class addComments {
    public function postComment(){


    }

}
class getComments{
    public function findComments($codeid){
        $dbc = new PDO("mysql:host=localhost;dbname=asl;port=8889", "root", "root");

        $sqlQ = $dbc->prepare("select * from comments where code_id = :codeid");

        $sqlQ->execute(array(":codeid"=>$codeid));

        $postItem = $sqlQ->fetchAll();

        return $postItem;
    }

}
