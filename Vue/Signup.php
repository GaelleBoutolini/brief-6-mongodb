<?php $logout = "" ?>

<?php ob_start(); ?>
<main>
    <div class="container">
        <!-- $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $sexe = $_POST['sexe'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $poids = $_POST['poids'];
        $taille = $_POST['taille'];
        $activite = $_POST['activite']; -->
        <form method="post" action="./index.php?action=signup">
            <h2>Inscription</h2>
            <div>
                <label for="nom">Nom</label>
                <?php if (isset($nom)) : ?>
                    <input type="text" id="nom" name="nom" value="<?= $nom ?>" required>
                <?php else : ?>
                    <input type="text" id="nom" name="nom" required>
                <?php endif ?>
            </div>
            <div>
                <label for="prenom">Prénom</label>
                <?php if (isset($prenom)) : ?>
                    <input type="text" id="prenom" name="prenom" value=<?= $nom ?> required>
                <?php else : ?>
                    <input type="text" id="prenom" name="prenom" required>
                <?php endif ?>
            </div>
            <div>
                <label for="email">Adresse e-mail</label>
                <?php if (isset($email)) : ?>
                    <input type="email" id="email" name="email" value=<?= $email ?> required>
                <?php else : ?>
                    <input type="email" id="email" name="email" required>
                <?php endif ?>
            </div>
            <div class="flex-50">
                <div>
                    <label for="sexe">Sexe</label>
                    <?php if (isset($sexe)) : ?>
                        <select name="sexe" id="sexe">
                            <option value=<?= $sexe ?>><?= $sexe ?> (Séléctionné)</option>
                            <option value="M">M</option>
                            <option value="F">F</option>
                        </select>
                    <?php else : ?>
                        <select name="sexe" id="sexe">
                            <option value="M">M</option>
                            <option value="F">F</option>
                        </select>
                    <?php endif ?>

                </div>

                <div>
                    <label for="age">Age</label>
                    <?php if (isset($email)) : ?>
                        <input type="number" id="naissance" name="age" value=<?= $age ?> required>
                    <?php else : ?>
                        <input type="number" id="naissance" name="age" required>
                    <?php endif ?>
                </div>
            </div>
            <div class="flex-50">
                <div>
                    <label for="poids">Poids(kg)</label>
                    <?php if (isset($poids)) : ?>
                        <input type="number" id="poids" name="poids" min="0" value=<?= $poids ?> required>
                    <?php else : ?>
                        <input type="number" id="poids" name="poids" min="0" required>
                    <?php endif ?>
                </div>

                <div>
                    <label for="taille">Taille(cm)</label>
                    <?php if (isset($taille)) : ?>
                        <input type="number" id="taille" name="taille" min="0" value=<?= $taille ?> required>
                    <?php else : ?>
                        <input type="number" id="taille" name="taille" min="0" required>
                    <?php endif ?>
                </div>
            </div>
            <div>
                <label for="activite">Activité</label>
                <?php if (isset($activite)) : ?>
                    <select name="activite" id="activite">
                        <option value="<?= $activite ?>"><?= $activite ?> (Séléctionné)</option>
                        <option value="Sédentaire">Sédentaire</option>
                        <option value="Légèrement actif">Légèrement actif</option>
                        <option value="Plutôt actif">Plutôt actif</option>
                        <option value="Actif">Actif</option>
                        <option value="Trés actif">Trés actif</option>
                    </select> <?php else : ?>
                    <select name="activite" id="activite">
                        <option value="Sédentaire">Sédentaire</option>
                        <option value="Légèrement actif">Légèrement actif</option>
                        <option value="Plutôt actif">Plutôt actif</option>
                        <option value="Actif">Actif</option>
                        <option value="Trés actif">Trés actif</option>
                    </select>
                <?php endif ?>

            </div>
            <div>
                <label for="password">Mot de passe</label>
                <?php if (isset($password)) : ?>
                    <input type="password" id="password" name="password" min="0" value=<?= $password ?> required>
                <?php else : ?>
                    <input type="password" id="password" name="password" min="0" required>
                <?php endif ?>
            </div>
            <p style="color: red"><?php echo $erreurInscription ?></p>
            <input id="form-btn" type="submit" value="Inscription">
        </form>
        <p>Vous avez déjà un compte ? <a href="./index.php?action=displayLogin">Connectez-vous&nbsp;!</a></p>
    </div>
</main>

<?php $logout = '' ?>
<?php $title = 'Inscription - Equilibra' ?>
<?php $style = './Tools/style/Form.css'; ?>
<?php $contenu = ob_get_clean(); ?>
<?php require 'Template.php'; ?>