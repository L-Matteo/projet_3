<?php 

class Inscription {
    private $conn;
    private $table_name = "inscription";

    private $idStagiaire;
    private $idFormation;
    private $etatInscription;
    private $dateInscription;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getIdStagiaire() { return $this->idStagiaire; }
    public function getIdFormation() { return $this->idFormation; }
    public function getEtat() { return $this->etatInscription; }
    public function getdate() { return $this->dateInscription; }

    public function inscription($idUser, $idFormation, $etat)
    {
        try {
            $query = "INSERT INTO " .$this->table_name. " VALUES(:idUser, :idFormation, :etat, CURRENT_DATE())";
            $stmt = $this->conn->prepare($query); 
            $stmt->bindParam(":idUser", $idUser);
            $stmt->bindParam(":idFormation", $idFormation);
            $stmt->bindParam(":etat", $etat);
            $stmt->execute(); 
            
            return $stmt;
        } catch(PDOException $e) {
            echo "Erreur lors de l'inscription : " . $e->getMessage();
            return false;
        }

    }

}