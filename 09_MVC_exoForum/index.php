<?php 

    require 'inc/head.php';
    require 'config/ini.php';
    require 'lib/functions.php';
    require 'lib/_helpers/tools.php';


?>



        <h1 class="title">Dashboard</h1>
        <div class="section">
          <div class="card is-shadowless">
            <div class="card-content">
            <a href="usersList.php" class="button is-dark ">Voir utilisateurs</a>
            </div>
          </div>
        </div>


        <div class="section">
          <div class="card is-shadowless">
            <div class="card-content">
            <a href="conversations.php" class="button is-dark ">Voir Conversations</a>
            </div>
          </div>
        </div>


<?php 
        require 'inc/foot.php'; 
?>