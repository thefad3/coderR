<?

$loggedUser = $_SESSION['uid'];
$userData = new userp();
$loggedData = $userData->getUser($loggedUser);
$dataLoggedin = $loggedData[0];
?>
<footer>
    <div class="col-md-2"></div>
    <div class="col-md-8 footerStyle">
    <ul>
        <li>© 2015 WickedMedia.us </li>
        <li class="right btn btn-danger"> <? echo $dataLoggedin['username']; ?> </li>
        <li class="right btn btn-danger"> Post Code </li>
        <li class="right btn btn-danger"> Home </li>


    </ul>
    </div>
    <div class="col-md-2"></div>
</footer>

</body>
</html>