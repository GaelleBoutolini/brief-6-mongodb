<?php
include('Controller/Controller.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'displaySignup') {
            displaySignup();
        } else if ($_GET['action'] == 'signup') {
            signup();
        } else if ($_GET['action'] == 'displayLogin') {
            displayLogin();
        } else if ($_GET['action'] == 'login') {
            login();
        } else if ($_GET['action'] == 'displayCreateMeal') {
            displayCreateMeal();
        } else if ($_GET['action'] == 'createMeal') {
            createMeal();
        }
        else if ($_GET['action'] == 'displayEditUser') {
            displayEditUser();
        }
         else if ($_GET['action'] == 'editUser') {
            editUser();
        }
         else if ($_GET['action'] == 'displayEditDeleteMeal') {
            displayEditDeleteMeal();
        } else if ($_GET['action'] == 'editMeal') {
            editMeal();
        } else if ($_GET['action'] == 'deleteMeal') {
            deleteMeal();
        } else if ($_GET['action'] == 'displayDashboard') {
            displayDashboard();
        } else if ($_GET['action'] == 'logout') {
            logout();
        } else
            throw new Exception("Action non valide");
    } else {
        home();  // action par défaut
    }
} catch (Exception $e) {
    error($e->getMessage());
}
