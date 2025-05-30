<?php
require_once "Model/stagiaire.php";

class ControllerStagiaire {
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function c_createAccount()
    {

        if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["btnCreateAccount"])){

            $stagiaire = new Stagiaire($this->db);

            $stagiaire->setNomStagiaire($_POST["createLastName"]);
            $stagiaire->setPrenomStagiaire($_POST["createFirstName"]);
            $stagiaire->setMailStagiaire($_POST["createMail"]);
            $stagiaire->setTelStagiaire($_POST["createTel"]);
            $stagiaire->setLogin($_POST["createLogin"]);
            $mdp = password_hash($_POST["createPassword"], PASSWORD_DEFAULT); 
            $stagiaire->setPassword($mdp);

            if($stagiaire->createAccount()){ 
                $message = "Votre compte a été créé avec succès ! ";
                require_once "View/message.php";
            } 

        } else {
            require_once "View/v_createAccount.php";
        }
    } 

    public function c_connexion() 
    {
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["SeConnecter"])) {
            
            $stagiaire = new Stagiaire($this->db);

            $mail = $_POST["connexionMail"];
            $mdp = $_POST["connexionPassword"];

            $stagiaireData = $stagiaire->connexion($mail);

            if($stagiaireData && password_verify($mdp, $stagiaireData["password"])) {
                $_SESSION["id_user"] = $stagiaireData["id"];
                $_SESSION["nom_user"] = $stagiaireData["nomStagiaire"];
                $_SESSION["prenom_user"] = $stagiaireData["prenomStagiaire"];
                $_SESSION["mail_user"] = $mail;
                header("Location: index.php?action=formation");
            } else { ?>
                <script>alert("Email ou mot de passe incorrect !")</script>
            <?php
            }

        }
    }
    
}
?>