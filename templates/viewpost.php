<div class="container-fluid">
<div class="row">
<nav>
    <ul class="left">
        <li><a href="/"> Home </a></li>
    </ul>
    <ul class="right">
        <li><? echo 'Welcome back, ' ?> - </li>
        <li><a href="/logout">Logout</a></li>
        <li><a href="/post">Upload Code</a></li>
    </ul>
</nav>
</div>
    <div class="row">
<?php
/**
 * Created by PhpStorm.
 * User: chrismac
 * Date: 3/24/15
 * Time: 11:37 AM
 */


$data = $returnedData[0];

echo'<div class="col-md-4">
            <b>'.$data['title'].'</b>
        <section>
            <code class="col-md-12 codeBox">
                    ' . $data['code'] .'
            </code>
        </section>
        </div>';

?>
        </div>
    </div>