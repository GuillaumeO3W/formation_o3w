<div class="section">
    <h1 class="title">Ajouter un utilisateur</h1>
    <div class="card is-shadowless">
        <div class="card-content">
            <form action="index.php?ctrl=user&action=insert" method="POST">
                <div class="field">
                    <label for="nom"  class="label">Nom</label>
                    <div class="control">
                        <input type="text" class="input" id="nom" name="nom" value="">
                    </div>
                </div>
                <div class="field">
                    <label for="email"  class="label">Email</label>
                    <div class="control">
                        <input type="text" class="input" id="email" name="email" value="">
                    </div>
                </div>
                <div class="field">
                    <label for="mdp"  class="label">Mot de passe</label>
                    <div class="control">
                        <input type="mdp" class="input" id="mdp" name="mdp" value="">
                    </div>
                </div>

                <button type="submit"  class="button is-link is-light">Ajouter</button>
            </form>
        </div>
    </div>
</div>