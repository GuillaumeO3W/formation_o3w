<?php 

    require 'inc/head.php';
    require 'config/ini.php';
    require 'lib/functions.php';
    require 'lib/_helpers/tools.php';

    try 
    {
      # on instancie ConversationModel afin de créer un objet de cette classe qui nous donnera acces aux methodes a travers la variable $conv
      $convModel = new ConversationModel();
      // debug($convModel);

      # On stocke dans $conversations le jeu de données renvoyées par $convModel->readAll() sous forme d'un tableau asociatif 
      $conversations = $convModel->readAll();
      // debug($conversations);

    // } catch(Exception $e)
    // {
    //   header('Location: .?_err=500');
    //   exit;
    // }
    } catch(Exception $e)
    {
      die($e->getMessage());
    }

?>
<a href="index.php" class="button is-dark ">Retour</a>
        <div class="section">
          <h1 class="title">Liste des conversations</h1>
          <div class="card is-shadowless">
            <div class="card-content">
              <?php if(!empty($conversations)) :?>
              <table class="table is-hoverable is-fullwidth">
                <thead>
                  <tr>
                    <th>Id Conv</th>
                    <th>Date Conv</th>
                    <th>Heure Conv</th>
                    <th>Nb Messages Conv</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    # On parcours notre tableau associatif et a chaque tour on créée un objet de Conversation afin d'avoir acces aux getters  
                      foreach($conversations as $data) :
                        $conv = new Conversation($data);
                      
                  ?>
                  <!-- Ternaire pour mettre en rouge le fond des conversations terminées  -->
                  <tr class="<?= (!$conv->getStatus() ? '' : 'has-background-danger') ?>">
                    <th><?= $conv->getId() ?></th>
                    <td><?= $conv->getDate() ?></td>
                    <td><?= $conv->getHour() ?></td>
                    <td><?= $conv->getNbMsg() ?></td>
                    <!-- on rajoute dans l'url un parametre ($_GET) pour cibler la conversation dans la page messages.php -->
                    <td><a href="messages.php?conv=<?= $conv->getId() ?>" class="button is-dark is-small">Voir messages</a></td>
                  </tr>   
                  <?php 
                    endforeach;
                  ?>
                </tbody>
              </table>
              <?php
                else: 
              ?>
                  <p>Aucune conversation</p>
              <?php
                endif
              ?>
            </div>
          </div>
        </div>


<?php 
        require 'inc/foot.php'; 
?>