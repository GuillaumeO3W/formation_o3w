<?php 

require 'inc/head.php';
require 'lib/_helpers/tools.php';
require 'class/Form.php';

?>

<div class="container w-50 mt-5">
    <div class="card p-4 border-0 shadow-sm">
        <form>
            <div class="mb-3">
                <?php 
                    echo Form::label('name', 'Votre nom');
                    echo Form::input('name', 'name', 'text'); 
                ?>
            </div>
            <div class="mb-3">
                <?php 
                    echo Form::label('pays', 'Sélectionnez un pays');
                    echo Form::select('pays', 'pays', ['France', 'Angleterre', 'Espagne', 'Belgique']); 
                ?>
            </div>

            <div class="mb-3">
                <?php 
                    echo Form::label('ville', 'Sélectionnez une ville');
                    echo Form::select('ville', 'pays', ['Paris', 'Londres', 'Madrid', 'Bruxelles']); 
                ?>
            </div>
        </form>
    </div>
</div>

<?php require 'inc/foot.php'; ?>