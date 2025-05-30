<?php

session_start();

require_once "View/v_header.php";
require_once "Model/connexionBdd.php";
require_once "Controller/c_stagiaire.php";
require_once "Controller/c_formation.php";
require_once "Controller/c_inscription.php";

$database = new Database();
$db = $database->getBdd();

$action = $_GET["action"] ?? "accueil"; 

$cs = new ControllerStagiaire($db);
$cf = new ControllerFormation($db);
$ci = new ControllerInscription($db);

switch($action){
    case "accueil":
        $cs->c_connexion();
        $cf->c_showFormations(); 
        break;
    case "createAccount":
        $cs->c_createAccount();
        break;
    case "formation":
        if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["BtnFiltre"])){
            $cf->c_filtrerFormation();
        } else {
            $cf->c_showFormations();
        }
        break;
    case "inscription":
        if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["btnInscription"])){
            $ci->c_inscription();
        } else {
            $cf->c_selectFormationById();
        }
        break;
    case "compte":
        if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["btnDeco"])) {
            session_destroy();
            header("Location: index.php?action=accueil");
        } else {
            require_once "View/compte.php";
        }
}

require_once "View/v_footer.php";
 
?>