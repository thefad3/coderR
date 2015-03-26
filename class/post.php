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

        $sqlQ = $dbc->prepare("select * from posts ORDER BY id DESC");

        $sqlQ->execute();

        $result = $sqlQ->fetchAll();
        return $result;

    }

}

class fetchPost{
    public function fetch($id){
        $dbc = new PDO("mysql:host=localhost;dbname=asl;port=8889", "root", "root");

        $sqlQ = $dbc->prepare("select * from posts where id = :id");

        $sqlQ->execute(array(":id"=>$id));

        $postItem = $sqlQ->fetchAll();

        return $postItem;
    }

}

class addPost{
    public function postAction($uid='', $name='', $desc='', $code=''){
        $dbc = new PDO("mysql:host=localhost;dbname=asl;port=8889", "root", "root");

        $sqlQ = $dbc->prepare("INSERT INTO `posts` (`id`, `poster_id`, `code`, `desc`, `title`) VALUES (NULL, :uid, :code, :descr, :title)");

        $sqlQ->execute(
            array(
                ":uid"=>$uid,
                ":title"=>$name,
                ":descr"=>$desc,
                ":code"=>$code
            ));

    }
}
class deletePost{
    public function deleteCode($pid){

        $dbh = new PDO("mysql:host=localhost;dbname=asl;port=8889", "root", "root");
        $sth = $dbh->prepare('DELETE FROM posts WHERE id=:id');
        $sth->execute(array("id"=>$pid));

    }
}