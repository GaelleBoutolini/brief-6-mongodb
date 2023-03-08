<?php
// require './Model/env.php';
require 'vendor/autoload.php'; // Inclure l'autoloader de l'extension MongoDB

// Etablir la connexion avec la base données
function getConnection()
{
    try {
        $client = new MongoDB\Client(
            "mongodb+srv://haroun:mdp@cluster0.lkr14vc.mongodb.net/?retryWrites=true&w=majority"
        );
        $db = $client->selectDatabase('Equilibra');
    } catch (Exception $e) {
        var_dump($e->getMessage());
        die();
    }
    return $db;
}

// Enregister un nouvel utilisateur dans la base de données
function getSignup($nom, $prenom, $sexe, $age, $email, $password, $poids, $taille, $activite)
{
    $collection = getConnection()->User;

    $emailExist = $collection->findOne(['email' => $email]);
    if ($emailExist) {
    } else {
        $result = $collection->insertOne([
            'nom' => $nom,
            'prenom' => $prenom,
            "sexe" => $sexe,
            'age' => $age,
            'email' => $email,
            'mdp' => $password,
            'poids' => $poids,
            'taille' => $taille,
            'activite' => $activite,
            'repas' => []
        ]);
    }
    return $result;
}

// Connexion de l'utlisateur avec vérification de ses identifiants
function getLogin($email, $password)
{
    $collection = getConnection()->User;
    $emailExist = $collection->findOne(['email' => $email]);

    if ($emailExist) {
        if ($emailExist->mdp == $password) {
            $result = $emailExist->_id;
        } else {
            $result = NULL;
        }
    } else {
        $result = NULL;
    }
    return $result;
}

// Récupération des info de l'utilisateur

function getUserInfo($id)
{
    $collection = getConnection()->User;
    $userInfo = $collection->findOne(['_id' => $id]);

    return $userInfo;
}


// Récupération de tous les repas d'une journée 
function getDayMeals($dayDate, $id)
{

    $paramDate = $dayDate;

    $collection =  getConnection()->Repas;
    $meals = $collection->find([
        "id_user" => $id,
        "date" => $dayDate
    ]);

    return $meals;
}

// //Récupération des données d'un repas 
// function getUserInfo($id)
// {
//     $collection = getConnection();
//     $emailExist = $collection->findOne(['email' => $email]);
//     $query->bindParam(':id', $id);
//     $query->execute();
//     $userInfo = $query->fetch(PDO::FETCH_ASSOC);
//     return $userInfo;
// }

// Création d'un nouveau repas
function getCreateNewMeal($id, $type, $intitule, $calories, $date, $heure)
{
    $collection = getConnection()->Repas;

    $result = $collection->insertOne([
        'id_user' => $id,
        'type' => $type,
        'description' => $intitule,
        'kcal' => $calories,
        'date' => $date,
        'heure' => $heure
    ]);

    return $result;
}

// Récupération des données d'un repas pour les afficher dans le formulaire de modification

function getOneMealInfo($repasId)
{
    $collection = getConnection()->Repas;
    $meal = $collection->findOne(["type" => "Collation"]);
    return $meal;
}

// // Modification d'un repas
// function getEditMeal($id, $type, $intitule, $calories, $heureDate)
// {
//     $pdo = getConnection();
//     $query = $pdo->prepare("UPDATE Repas SET Type = :typeRepas, Description = :intitule, Kcal = :calories, Date = :heureDate
//     WHERE Id_repas = :id");
//     $query->bindParam(':id', $id);
//     $query->bindParam(':typeRepas', $type);
//     $query->bindParam(':intitule', $intitule);
//     $query->bindParam(':calories', $calories);
//     $query->bindParam(':heureDate', $heureDate);
//     $result = $query->execute();
//     return $result;
// }

// // Modification d'un repas
// function getDeleteMeal($id)
// {
//     $pdo = getConnection();
//     $query = $pdo->prepare("DELETE FROM Repas WHERE Id_repas = :id");
//     $query->bindParam(':id', $id);

//     $result = $query->execute();
//     return $result;
// }

// function getEditUser($id, $nom, $prenom, $sexe, $age, $email, $password, $poids, $taille, $activite)
// {

//     // $query = $pdo->prepare("INSERT INTO Utilisateur (Nom, Prenom, Sexe, Age, Email, Mdp, Poids, Taille, Activite)

//     $pdo = getConnection();
//     $query = $pdo->prepare("UPDATE Utilisateur 
//                             SET Nom = :nom, Prenom = :prenom, Sexe = :sexe, 
//                             Age = :age, Email = :email, Mdp = :mdp, 
//                             Poids = :poids, Taille = :taille, Activite = :activite 
//                             WHERE Id_user = :id");
//     $query->bindParam(':nom', $nom);
//     $query->bindParam(':prenom', $prenom);
//     $query->bindParam(':sexe', $sexe);
//     $query->bindParam(':age', $age);
//     $query->bindParam(':email', $email);
//     $query->bindParam(':mdp', $password);
//     $query->bindParam(':poids', $poids);
//     $query->bindParam(':taille', $taille);
//     $query->bindParam(':activite', $activite);
//     $query->bindParam(':id', $id);
//     $result = $query->execute();

//     return $result;
// }

// function getUserChangeInfo($id)
// {

//     $pdo = getConnection();
//     $query = $pdo->prepare("SELECT Nom, Prenom, Taille, Email, 
//                                     Sexe, Age, Poids, Taille, Activite
//                             FROM Utilisateur
//                             WHERE Id_user = :id");
//     $query->bindParam(':id', $id);
//     $query->execute();
//     $userChangeInfo = $query->fetch(PDO::FETCH_ASSOC);

//     return $userChangeInfo;
// }
