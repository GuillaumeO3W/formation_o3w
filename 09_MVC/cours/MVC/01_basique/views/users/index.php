


<h1 class="display-1 text-center my-5">Liste des Utilisateurs</h1>

        <div class="container w-50">
        <a class="btn btn-primary mb-3" href="index.php?ctrl=role&action=index" role="button">Voir la liste des roles</a>
        <a class="btn btn-primary mb-3" href="index.php?ctrl=user&action=create" role="button">Ajouter un utilisateur</a>
        <div class="card p-4 border-0 shadow-sm">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Login</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>

                    <?php 
                        if(!empty($users)):
                            foreach($users as $user) :
                    ?> 

                    <tr>
                        <th scope="row"><?= $user->getId() ?></th>
                        <td><?= $user->getLogin() ?></td>
                        <td><?= $user->getLibelle() ?></td>
                        <td>
                        <a href="index.php?ctrl=user&action=show&id=<?= $user->getId() ?>" class="me-3"><i class="bi bi-eye-fill"></i></a>
                    
                        <a href="index.php?ctrl=user&action=edit&id=<?= $user->getId() ?>" class="me-3"><i class="bi bi-pencil-square"></i></i></a>
                    
                        <a href="index.php?ctrl=user&action=delete&id=<?= $user->getId() ?>"><i class="bi bi-trash-fill text-danger"></i></a>
                        </td>
                    </tr>
                    <?php
                        endforeach;
                    
                    else : 
                        echo '<p>Aucun utilisateur en base</p>'  ;  
                    
                    endif;

                    ?>

                </tbody>
            </table>
        </div>