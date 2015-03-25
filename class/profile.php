<?

class profile {
    public function fetchProfile($id){
    $dbc = new PDO("mysql:host=localhost;dbname=asl;port=8889", "root", "root");

    $sqlQ = $dbc->prepare("select * from posts where poster_id = :id ORDER BY id DESC");

    $sqlQ->execute(array(':id'=>$id));

    $result = $sqlQ->fetchAll();
    return $result;

    }
}

?>