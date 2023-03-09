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

    $collection =  getConnection()->Repas;
    $meals = $collection->find([
        "id_user" => $id,
        "date" => $dayDate
    ]);
    $mealsArr =  iterator_to_array($meals);

    return $mealsArr;
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
    $meal = $collection->findOne(["_id" => new MongoDB\BSON\ObjectID($repasId)]);
    return $meal;
}

// // Modification d'un repas
function getEditMeal($id, $type, $intitule, $calories, $date, $heure)
{
    // echo $id .'<br>';
    // echo $type .'<br>';
    // echo $intitule .'<br>';
    // echo $calories .'<br>';
    // echo $date .'<br>';
    // echo $heure .'<br>';

    $collection = getConnection()->Repas;

    $result = $collection->updateOne(
        ["_id" => new MongoDB\BSON\ObjectID($id)],
        ['$set' => [
        'type' => $type,
        'description' => $intitule,
        'kcal' => $calories,
        'date' => $date,
        'heure' => $heure
    ]]);

    return $result;
}

// Modification d'un repas
function getDeleteMeal($repasId)
{
    $collection = getConnection()->Repas;
    $result = $collection->deleteOne(["_id" => new MongoDB\BSON\ObjectID($repasId)]);
    return $result;
}

function getEditUser($id, $nom, $prenom, $sexe, $age, $email, $password, $poids, $taille, $activite)
{

    $collection = getConnection()->User;
    $result = $collection->updateOne(
        ["_id" => new MongoDB\BSON\ObjectID($id)],
        ['$set' => [
            'nom' => $nom,
            'prenom' => $prenom,
            'sexe' => $sexe,
            'age' => $age,
            'email' => $email,
            'password' => $password,
            'poids' => $poids,
            'taille' => $taille,
            'activite' => $activite,
        ]]
    );

    return $result;
}

function getUserChangeInfo($id)
{
    $collection = getConnection()->User;
    $userChangeInfo = $collection->findOne(['_id' => $id]);

    return $userChangeInfo;
}