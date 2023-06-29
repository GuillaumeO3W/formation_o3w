<?php
include ('nav.php');
?>

<div class="container d-flex flex-column min-vh-100 justify-content-center align-items-center">
    <p>Hello</p>
    <p class="fw-bold"><?= $_SESSION['member']['name']. " ".$_SESSION['member']['lastname']  ?></p>
</div>

<!-- DEBUG ---------------------------- -->
<div class="d-none ">
    <h2 >Debug</h2>
    <pre class="text-warning"><?php print_r($_SESSION); ?></pre>
    <pre class="text-info"><?php print_r($users); ?></pre>
</div>

</body>
</html>