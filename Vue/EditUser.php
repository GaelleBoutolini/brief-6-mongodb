<?php ob_start(); ?>
<main>
    <div class="container">
        <form method="post" action="./index.php?action=editUser">
            <h2>Modification du profil</h2>
            <div>
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" value="<?= $userChangeInfo['Nom'] ?>" required>
            </div>
            <div>
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" value="<?= $userChangeInfo['Prenom'] ?>" required>
            </div>
            <div>
                <label for="email">Adresse e-mail</label>
                <input type="email" id="email" name="email" value="<?= $userChangeInfo['Email'] ?>" required>
            </div>
            <div class="flex-50">
                <div>
                    <label for="sexe">Sexe</label>
                    <select name="sexe" id="sexe" value="<?= $userChangeInfo['Sexe'] ?>">
                        <option value="M">M</option>
                        <option value="F">F</option>
                    </select>
                </div>

                <div>
                    <label for="age">Age</label>
                    <input type="number" id="naissance" name="age" value="<?= $userChangeInfo['Age'] ?>" required>
                </div>
            </div>
            <div class="flex-50">
                <div>
                    <label for="poids">Poids</label>
                    <input type="number" id="poids" name="poids" min="0" value="<?= $userChangeInfo['Poids'] ?>" required>
                </div>

                <div>
                    <label for="taille">Taille(cm)</label>
                    <input type="number" id="taille" name="taille" min="0" value="<?= $userChangeInfo['Taille'] ?>" required>
                </div>
            </div>
            <div>
                <label for="activite">Activité</label>
                <select name="activite" id="activite">
                    <option value="<?= $userChangeInfo['Activite'] ?>"><?= $userChangeInfo['Activite'] ?> (Séléctionné)</option>
                    <option value="Sédentaire">Sédentaire</option>
                    <option value="Légèrement actif">Légèrement actif</option>
                    <option value="Plutôt actif">Plutôt actif</option>
                    <option value="Actif">Actif</option>
                    <option value="Trés actif">Trés actif</option>
                </select>
            </div>
            <div>
                <label for="password">Nouveau mot de passe</label>
                <input type="password" id="password" name="password" placeholder="***********" required>
            </div>

            <input id="form-btn" type="submit" value="Modification">
        </form>
        <p id="empty"></p>
    </div>
</main>

<?php $logout = "<a href='./index.php?action=logout' class='logout' title='Déconnexion'><i class='fa-solid fa-power-off'></i></a>" ?>
<?php $title = 'Modifier mon profil - Equilibra' ?>
<?php $style = './Tools/style/Form.css'; ?>
<?php $contenu = ob_get_clean(); ?>
<?php require 'Template.php'; ?>