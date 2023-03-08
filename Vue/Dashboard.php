<?php ob_start(); ?>
<div id="loader">
    <div id="dot1"></div>
    <div id="dot2"></div>
    <div id="dot3"></div>
</div>
<main>
    <div class="container">
        <div id="btn-container">
            <a id="add-btn" href="./index.php?action=displayCreateMeal">
                <i class="fa-solid fa-plus"></i>
                Ajouter un repas
            </a>
        </div>
        <section id="historique">
            <h2 id="jour">Vos repas de la journée du : <span id="today"><?= date("d/m/Y", time()) ?></span></h2>
            <div id="repas">

                <?php foreach ($meals as $meal) : ?>
                    <a class="repas-container" href=./index.php?action=displayEditDeleteMeal&id=<?= $meal['_id'] ?>>
                        <h3><?= $meal["type"] ?></h3>
                        <span class="nom-repas"><?= $meal["description"] ?></span>
                        <div>
                            <span class="kcal"><span><?= $meal["kcal"] ?>kcal</span></span>
                            <span class="heure"><?= $meal["heure"] ?></span>
                        </div>
                    </a>
                <?php endforeach; ?>

            </div>
            <div id="total-kcal">Total calorique de la journée : <strong><?= $dailyCalTotal ?>kcal</strong></div>
        </section>
        <div id="main-bottom">
            <div id="objectif-profil">
                <?php if ($goalAchieved == true) : ?>
                    <section id="objectif" class="green">
                        <div id="objectif-calorie" class="green">
                            <div>Objectif journalier</div>
                            <div id="kcal"><span><?= $dailyCalGoal ?></span>kcal</div>
                        </div>
                        <div id="résultat">
                            Bon
                        </div>

                    </section>
                <?php else : ?>
                    <section id="objectif" class="red">
                        <div id="objectif-calorie">
                            <div>Objectif journalier</div>
                            <div id="kcal"><span><?= $dailyCalGoal ?></span>kcal</div>
                        </div>
                        <div id="résultat">
                            Échec
                        </div>

                    </section>
                <?php endif ?>
                <section id="profil">
                    <div class="title">
                        <h2>Mon profil</h2>
                        <a href="./index.php?action=displayEditUser"><i class="fa-solid fa-pen"></i></a>
                    </div>
                    <div class="information">
                        <p><?= $userInfo["nom"] ?></p>
                        <p><?= $userInfo["prenom"] ?></p>
                        <p><?= $userInfo["taille"] ?> cm</p>
                        <p><?= $userInfo["poids"] ?> kg</p>
                        <p>IMC : <?= $imc ?></p>
                        <p><?= $physique ?></p>
                        <p><?= $userInfo["activite"] ?></p>
                    </div>
                </section>
            </div>

            <section id="stats">
                <h2>Consommation calorique des 10 derniers jours</h2>
                <div>
                    <!-- Graphique des 10 derniers jours  -->
                </div>
            </section>

        </div>
    </div>
</main>


<script defer>
    const statsArr = <?php echo json_encode($statsArr) ?>;
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js" defer></script>
<script src="./Tools/js/stats.js" defer></script>

<?php $title = 'Dashboard - Equilibra'; ?>
<?php $style = './Tools/style/Dashboard.css'; ?>
<?php $logout = "<a href='./index.php?action=logout' class='logout' title='Déconnexion'><i class='fa-solid fa-power-off'></i></a>" ?>
<?php $contenu = ob_get_clean(); ?>

<?php require 'Template.php'; ?>