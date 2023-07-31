<?php
session_start();
?>
<h1>Dashboard</h1>
<p>Bonjour <span style="font-weight: bold; color: red;"><?=  $_SESSION['espaceadmin']['login']; ?></span></p>
