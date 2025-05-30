<?php

require_once "Model/inscription.php";

class ControllerInscription {
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function c_inscription() 
    {
        $inscription = new Inscription($this->db);

        $idUser = $_SESSION["id_user"];
        $idFormation = $_GET["key"];
        $etat = "";

        if($inscription->inscription($idUser, $idFormation, $etat)) {
            $message = "Vous êtes désormais inscrit à cette formation.";
            require_once "View/message.php";
        } 
    }
}