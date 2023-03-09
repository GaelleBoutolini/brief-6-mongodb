<?php
require './Model/Model.php';
session_start();

function home()
{
    require './Vue/Home.php';
};

// Afficher la page d'inscription
function displaySignup()
{
    if (isset($_SESSION['id'])) {
        header('Location: index.php?action=displayDashboard');
        require './Vue/Dashboard.php';
    } else {
        require './Vue/Signup.php';
    }
}

// Inscription de l'utilisateur
function signup()
{
    if (!empty($_POST)) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $sexe = $_POST['sexe'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $poids = $_POST['poids'];
        $taille = $_POST['taille'];
        $activite = $_POST['activite'];

        $result = getSignup($nom, $prenom, $sexe, $age, $email, $password, $poids, $taille, $activite);

        if ($result) {
            require './Vue/Successfull_signup.php';
        } else {
            $erreurInscription = "L'adresse email existe déjà.";
            require './Vue/Signup.php';
        }
    }
}

// Afficher la page de connexion
function displayLogin()
{
    if (!isset($_SESSION['id'])) {
        require './Vue/Login.php';
    } else {
        header('Location: index.php?action=displayDashboard');
        require './Vue/Dashboard.php';
    }
}


// Connexion de l'utilisateur
function login()
{
    if (isset($_SESSION['id'])) {
        header('Location: index.php?action=displayDashboard');
        require './Vue/displayDashboard.php';
    } else {
        if (!empty($_POST)) {
            $mail = $_POST['identifiant'];
            $password = $_POST['password'];
            $userId = getLogin($mail, $password);

            if ($userId != NULL) {
                $_SESSION['id'] = $userId;
                header('Location: index.php?action=displayDashboard');
            } else {
                $erreurConnexion = "Identifiants incorrects";
                require './Vue/Login.php';
            }
        }
    }
}

function displayDashboard()
{

    if (!isset($_SESSION['id'])) {
        require './Vue/Home.php';
        header('Location: index.php');
    } else {


        $dayDate = date("Y-m-d", time());
        $id = $_SESSION['id'];

    //Fonctions modele (questionne la base de donnée)

    //permet d'obtenir les infos des repas du jour
    $meals = getDayMeals($dayDate, $id);
    //permet d'obtenir les infos de l'user


    $userInfo = getUserInfo($id);
    foreach($userInfo as $cle => $valeur) {
        echo $cle . ':' . $valeur . '<br>';
    }


    // // Fonctions controleur (utilise les données rendues par le modele pour faire des calculs)
    $imc = round(imc($userInfo), 1);
    // $physique = whatPhysique($imc);

    // $dailyCalTotal = dailyCaloriesTotal($meals);
    // $dailyCalGoal = dailyCaloriesGoal($userInfo);
    // $goalAchieved = isGoalAchieved($dailyCalTotal, $dailyCalGoal);
    // $statsArr = totalTenDaysCalories($dailyCalGoal);
    require './Vue/Dashboard.php';
    }
}

// Afficher la page d'ajout de repas
function displayCreateMeal()
{
    if (!isset($_SESSION['id'])) {
        require './Vue/Home.php';
        header('Location: index.php');
    } else {
        require './Vue/CreateMeal.php';
    }
}

// Ajout d'un repas
function createMeal()
{
    if (!empty($_POST)) {
        $id = $_SESSION['id'];
        $type = $_POST['type'];
        $intitule = $_POST['intitule'];
        $calories = $_POST['calories'];
        $date = explode('T', $_POST['heure-date'])[0];
        $heure = explode('T', $_POST['heure-date'])[1];
        $result = getCreateNewMeal($id, $type, $intitule, $calories, $date, $heure);
        if ($result) {
            header('Location: index.php?action=displayDashboard');
            require './Vue/Dashboard.php';
        } else {
            require './Vue/Error.php';
        }
    }
}

// Afficher la page d'ajout de repas
function displayEditDeleteMeal()
{
    $repasId = $_GET['id'];
    $mealInfo = getOneMealInfo($repasId);
    print_r($mealInfo);
    if (!isset($_SESSION['id'])) {
        require './Vue/Home.php';
        header('Location: index.php');
    } else {
        print_r($mealInfo);
        require './Vue/EditDeleteMeal.php';
    }
}
// Modifier d'un repas
function editMeal()
{
    if (!empty($_POST)) {
        $repasId = $_GET['id'];
        $type = $_POST['type'];
        $intitule = $_POST['intitule'];
        $calories = $_POST['calories'];
        $date = explode('T', $_POST['heure-date'])[0];
        $heure = explode('T', $_POST['heure-date'])[1];

        $result = getEditMeal($repasId, $type, $intitule, $calories, $date, $heure);
        // print_r($result);

        if ($result == true || $result == 1) {
            header('Location: index.php?action=displayDashboard');
            require './Vue/Dashboard.php';
        } else {
            require './Vue/Error.php';
        }
    }
}
// Supprimer d'un repas
function deleteMeal()
{
    $repasId = $_GET['id'];
    $result = getDeleteMeal($repasId);
    if ($result == true || $result == 1) {
        header('Location: index.php?action=displayDashboard');
    } else {
        require './Vue/Error.php';
    }
}

// // Afficher la page de modification d'utilisateur
// function displayEditUser()
// {
//     if (!isset($_SESSION['id'])) {
//         require './Vue/Home.php';
//         header('Location: index.php');
//     } else {
//         $id = $_SESSION['id'];
//         $userChangeInfo = getUserChangeInfo($id);
//         require './Vue/EditUser.php';
//     }
// }

// // Modification d'un utilisateur 
// function editUser()
// {
//     $id = $_SESSION['id'];

//     if (!empty($_POST)) {
//         $nom = $_POST['nom'];
//         $prenom = $_POST['prenom'];
//         $sexe = $_POST['sexe'];
//         $age = $_POST['age'];
//         $email = $_POST['email'];
//         $password = $_POST['password'];
//         $poids = $_POST['poids'];
//         $taille = $_POST['taille'];
//         $activite = $_POST['activite'];

//         $result = getEditUser($id, $nom, $prenom, $sexe, $age, $email, $password, $poids, $taille, $activite);
//         if ($result === true) {
//             header('Location: index.php?action=displayDashboard');
//         } else {
//             require './Vue/Error.php';
//         }
//     }
// }

// Déconnexion
function logout()
{
    session_unset();
    require './Vue/Home.php';
    header('Location: index.php');
}

// Erreur
function error($msgErreur)
{
    require './Vue/Error.php';
}



//Fonctions de calcul
//--------------------------------------

// Calcul de l'imc 
// Poids / (Taille * Taille)

function imc($userInfo)
{
    $weight = $userInfo["poids"];
    $size = $userInfo["taille"] / 100;

    $imc = $weight / ($size * $size);

    return $imc;
}

// // Défini la forme physique du user en fonction de son imc
// function whatPhysique($imc)
// {
//     $physique = 0;
//     switch ($imc) {
//         case ($imc < 16.5):
//             $physique = "Anorexie ou dénutrition";
//             break;
//         case ($imc >= 16.5 && $imc < 18.5):
//             $physique = "Insuffisance Ponderale";
//             break;
//         case ($imc >= 18.5 && $imc < 25):
//             $physique = "Corpulence normale";
//             break;
//         case ($imc >= 25 && $imc < 30):
//             $physique = "Surpoids";
//             break;
//         case ($imc >= 30 && $imc < 35):
//             $physique = "Obésité modérée (Classe 1)";
//             break;
//         case ($imc >= 35 && $imc < 40):
//             $physique = "Obésité élevé (Classe 2)";
//             break;
//         case ($imc >= 40):
//             $physique = "Obésite morbide ou massive";
//             break;
//         default:
//             $physique = "Non Renseigné";
//             break;
//     }
//     return $physique;
// }
// // Calcul le total de calories consommé dans la journée
// function dailyCaloriesTotal($meals)
// {
//     $total = 0;
//     foreach ($meals as $meal) {
//         $total += $meal['Kcal'];
//     }
//     return $total;
// }
// // Calcul la limite calorique pour perdre du poids
// // Méthode oxford : (14.2 x Poids + 593) * coef;
// function dailyCaloriesGoal($userInfo)
// {
//     // Calcul du métabolisme de base
//     $MB = 14.2 * $userInfo['Poids'] + 593;
//     // Calcul du coef en fonction de l'activité
//     $coef = 0;
//     switch ($userInfo['Activite']) {
//         case 'Sédentaire':
//             $coef = 1.2;
//             break;
//         case 'Légèrement actif':
//             $coef = 1.375;
//             break;
//         case "Plutôt actif":
//             $coef = 1.55;
//             break;
//         case "Actif":
//             $coef = 1.725;
//             break;
//         case "Trés actif":
//             $coef = 1.9;
//             break;
//     }
//     $dailyCaloriesGoal = $MB * $coef;
//     return round($dailyCaloriesGoal);
// }
// // Vérifie si l'objectif a été réussi ou non
// function isGoalAchieved($dailyCalTotal, $dailyCalGoal)
// {
//     $isGoalAchieved = true;
//     if ($dailyCalTotal > $dailyCalGoal) {
//         $isGoalAchieved = false;
//     } else {
//         $isGoalAchieved = true;
//     }
//     return $isGoalAchieved;
// }

// // Calcul des calories des 10 derniers jours
// function totalTenDaysCalories($dailyCalGoal)
// {
//     $today = time();
//     $id = $_SESSION['id'];
//     $daysArr = [];
//     $caloriesGoalArr = [];
//     $lastTenDayCaloriesArr = [];
//     for ($i = 0; $i < 10; $i++) {
//         array_unshift($daysArr, date("d/m", $today));

//         // Courbe consommation calorique
//         $dayDate = date("Y-m-d", $today);
//         $meals = getDayMeals($dayDate, $id);
//         array_unshift($lastTenDayCaloriesArr,  dailyCaloriesTotal($meals));
//         $today -= 86400;

//         // Courbe objectif
//         array_unshift($caloriesGoalArr, $dailyCalGoal);
//     };
//     $statsArr[] = [$lastTenDayCaloriesArr, $caloriesGoalArr, $daysArr];
//     return $statsArr;
//     //retourne un tableau avec le total calorique des derniers 10 jours
// }
