<?php ob_start(); ?>
<? phpinfo(); ?>
<main>
    <section>

        <div class="firstMsgDaccueilUser">
            <h2 class="msg"> Bienvenue sur Equilibra</h2>
            <img src="./Tools/image/illustration-accueil.webp">
            <p> Être en forme n'a jamais été aussi facile!! </p>
        </div>


        <div class="secondMsgDaccueilUser">
            <div id="links">
                <div class="link">
                    <p class="msgDaccueilUser2"> Vous avez déjà utilisé notre app</p>
                    <a href="./index.php?action=displayLogin" type="submit" name="log-in">Se connecter</a>
                </div>

                <div class="link">
                    <p class="msgDaccueilUser2"> Vous n'êtes pas encore inscrit </p>
                    <a href="./index.php?action=displaySignup" name="sign-up">Inscrivez-vous</a>
                </div>

            </div>

        </div>
    </section>
</main>
<?php $logout = '' ?>
<?php $title = 'Home' ?>
<?php $style = './Tools/style/Home.css' ?>
<?php $contenu = ob_get_clean(); ?>
<?php require 'Template.php'; ?>