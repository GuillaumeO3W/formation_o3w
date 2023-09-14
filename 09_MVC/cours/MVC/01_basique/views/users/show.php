
<h1 class="display-1 text-center my-5">Page d'un seul User</h1>
<h2 class="display-2 text-center my-5">Utilisateur : <?= $user->getLogin() ?> </h2>

        <div class="container w-50">
        <a class="btn btn-dark mb-3" href="index.php" role="button">Retour</a>
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
                    
                    <tr>
                        <th scope="row"><?= $user->getId() ?></th>
                        <td><?= $user->getLogin() ?></td>
                        <td><?= $user->getLibelle() ?></td>
                        <td>
                                           
                        <a href="userEdit.php?id=<?= $user->getId() ?>" class="me-3"><i class="bi bi-pencil-square"></i></i></a>
                    
                        <a href="deleteUser.php?id=<?= $user->getId() ?>"><i class="bi bi-trash-fill text-danger"></i></a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>