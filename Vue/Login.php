<?php ob_start(); ?>
<main>
    <div class="container">

        <form method="post" action="./index.php?action=login">
            <h2>Connexion</h2>
            <div>
                <label for="identifiant">Identifiant</label>
                <?php if (isset($mail)) : ?>
                    <input type="email" id="identifiant" name="identifiant" value="<?= $mail ?>" required>
                <?php else : ?>
                    <input type="email" id="identifiant" name="identifiant" required>
                <?php endif ?>
            </div>
            <div>
                <label for="password">Mot de passe</label>
                <?php if (isset($password)) : ?>
                    <input type="password" id="password" name="password" value="<?= $password ?>" required>
                <?php else : ?>
                    <input type="password" id="password" name="password" required>
                <?php endif ?>
            </div>

            <p style="color: red"><?php echo $erreurConnexion ?></p>

            <input id="form-btn" type="submit" value="Connexion">
        </form>
        <p>Vous n'êtes pas encore inscrit ? <a href="./index.php?action=displaySignup">Inscrivez&#8209;vous&nbsp;!</a></p>
    </div>
</main>


<?php $title = 'Connexion - Equilibra' ?>
<?php $style = './Tools/style/Form.css'; ?>
<?php $logout = "" ?>
<?php $contenu = ob_get_clean(); ?>
<?php require 'Template.php'; ?>