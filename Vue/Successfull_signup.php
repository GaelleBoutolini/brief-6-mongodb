<?php ob_start(); ?>
<main>
    <div class="container">
        <p class="success-msg">✅ Votre compte a été créé avec succés.<br><br>Pour vous connecter, cliquez<a href="./index.php?action=displayLogin">&nbsp;ici&nbsp;</a>.</p>
    </div>
</main>




<?php $title = 'Inscription réussi - Equilibra' ?>
<?php $style = './Tools/style/Form.css'; ?>
<?php $contenu = ob_get_clean(); ?>
<?php $logout = "" ?>
<?php require 'Template.php'; ?>