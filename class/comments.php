<?php
/**
 * Created by PhpStorm.
 * User: chrismac
 * Date: 3/25/15
 * Time: 2:02 PM
 */

class addComments {
    public function postComment($pid, $comments, $codeid){
        $dbc = new PDO("mysql:host=localhost;dbname=asl;port=8889", "root", "root");
        $date = new DateTime();
        $timeStamp = $date->format('Y-m-d');
        $sqlQ = $dbc->prepare("INSERT INTO `comments` (`id`, `posterId`, `comments`, `code_id`, `time`) VALUES (NULL, :pid, :comments, :codeid, :timestamp )");

        $sqlQ->execute(
            array(
                ":pid"=>$pid,
                ":comments"=>$comments,
                ":codeid"=>$codeid,
                ":timestamp"=>$timeStamp
            ));


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
