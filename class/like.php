<?

class like
{
    public function likeCode($uid, $cid)
    {
        $dbc = new PDO("mysql:host=localhost;dbname=asl;port=8889", "root", "root");

        $sqlQ = $dbc->prepare("insert into likes(id, pid, aid) VALUES(NULL, :cid, :uid)");

        $sqlQ->execute(array(":cid" => $cid, ":uid" => $uid));

        $return = $sqlQ->fetchAll();
        return $return;

    }
}

class unLike{
    public function unlikeCode($uid, $cid)
    {
        $dbc = new PDO("mysql:host=localhost;dbname=asl;port=8889", "root", "root");

        $sqlQ = $dbc->prepare("delete from likes where ");

        $sqlQ->execute(array(":cid" => $cid, ":uid" => $uid));
    }
}

class checkLike{
    public function likeCheck($uid){

        $dbc = new PDO("mysql:host=localhost;dbname=asl;port=8889", "root", "root");

        $sqlQ = $dbc->prepare("select * from likes where aid=:uid");

        $sqlQ->execute(array(":uid" => $uid));

        $data = $sqlQ->fetchAll();

        return $data;

    }
}


?>