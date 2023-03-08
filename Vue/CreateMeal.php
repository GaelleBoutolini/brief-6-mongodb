<?php ob_start(); ?>
<main>
    <div class="container">

        <form method="post" action="./index.php?action=createMeal">
            <h2>Nouveau plat</h2>
            <div>
                <label for="type">Type du plat</label>
                <select name="type" id="type">
                    <option value="Petit-déj">Petit-déj</option>
                    <option value="Collation">Collation</option>
                    <option value="Déjeuner">Déjeuner</option>
                    <option value="Dessert">Dessert</option>
                    <option value="Goûter">Goûter</option>
                    <option value="Dîner">Dîner</option>
                </select>
            </div>
            <div>
                <label for="intitule">Intitulé du plat</label>
                <input type="text" id="intitule" name="intitule" required>
            </div>
            <div>
                <label for="calories">Énergie (kcal)</label>
                <input type="text" id="calories" name="calories" required>
            </div>
            <div>
                <label for="heure-date">Heure et date</label>
                <input type="datetime-local" id="heure-date" name="heure-date" required>
            </div>
            <input id="form-btn" type="submit" value="Ajouter">
        </form>
        <p id="empty"></p>
    </div>
</main>

<?php $logout = "<a href='./index.php?action=logout' class='logout' title='Déconnexion'><i class='fa-solid fa-power-off'></i></a>" ?>
<?php $title = 'Ajouter un repas - Equilibra' ?>
<?php $style = './Tools/style/Form.css'; ?>
<?php $contenu = ob_get_clean(); ?>
<?php require 'Template.php'; ?>