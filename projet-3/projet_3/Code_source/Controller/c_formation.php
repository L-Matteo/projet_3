<?php 

require_once "Model/formations.php";

class ControllerFormation {
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function c_showFormations()
    {
        $formation = new Formation($this->db);
        $stmt = $formation->showFormations();
        $lesFormations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if(isset($_SESSION["id_user"])) { 
            require_once "View/formations.php";
        } else {
            require_once "View/v_accueil.php";
        }
    }

    public function c_filtrerFormation() 
    {
        if(isset($_POST["BtnFiltre"])) {

            $formation = new Formation($this->db);
            $idNiv = $_POST["nameFiltre"];

            switch($idNiv) {
                case "debutant":
                    $stmt = $formation->filterFormationByLevel(1);
                    break;
                case "intermediaire":
                    $stmt = $formation->filterFormationByLevel(2);
                    break;
                case "confirme":
                    $stmt = $formation->filterFormationByLevel(3);
                    break;
            }

            if($stmt) {
                $lesFormations = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }

            require_once "View/filtreFormation.php";
        }
    }

    public function c_selectFormationById()
    {
        $formation = new Formation($this->db);
        $id = $_GET["key"];
        $stmt = $formation->selectFormationById($id);
        $details = $stmt->fetch();

        require_once "View/inscriptionFormation.php";
    }
}

?>