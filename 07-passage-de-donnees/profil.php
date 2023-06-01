
<h2>DEBUG</h2>
<pre>
    <?php var_dump($_GET);?>
</pre>
<hr>

<?php

// $user = $_GET['user'];
// $id = $_GET['id'];

$getUrl = $_GET;

foreach($getUrl as $key => $value){

    echo '<p>'.$key.' : '.$value.'</p>';

}



// echo '<p>'.$user.'</p>';
// echo $id;