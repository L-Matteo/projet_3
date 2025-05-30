<?php

class Formation
{
    private $conn;
    private $table_name = "formation";

    private String $nomFormation;
    private String $descriptionFormation;
    private DateTime $dateHeureDebutFormation;
    private DateTime $dateHeureFinFormation;
    private float $prixTTC;
    private int $nbrParticipants;
    private int $placesDispo;
    private int $numThemeFormation;
    private int $numNiveauFormation;
    private int $numModalitesFormation;
    private int $numLieuFormation;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function __destruct() {}

    public function getNomFormation(): string
    {
        return $this->nomFormation;
    }
    public function setNomFormation(string $nomFormation)
    {
        $this->nomFormation = $nomFormation;
    }

    public function getDescriptionFormation()
    {
        return $this->descriptionFormation;
    }
    public function setDescriptionFormation(string $descriptionFormation)
    {
        $this->descriptionFormation = $descriptionFormation;
    }

    public function getDateHeureDebutFormation()
    {
        return $this->dateHeureDebutFormation;
    }
    public function setDateHeureDebutFormation(DateTime $dateHeureDebutFormation)
    {
        $this->dateHeureDebutFormation = $dateHeureDebutFormation;
    }

    public function getDateHeureFinFormation()
    {
        return $this->dateHeureFinFormation;
    }
    public function setDateHeureFinFormation(DateTime $dateHeureFinFormation)
    {
        $this->dateHeureFinFormation = $dateHeureFinFormation;
    }

    public function getPrixTTC(): float
    {
        return $this->prixTTC;
    }
    public function setPrixTTC(float $prixTTC): void
    {
        $this->prixTTC = $prixTTC;
    }

    public function getNbrParticipants(): int
    {
        return $this->nbrParticipants;
    }
    public function setNbrParticipants(int $nbrParticipants): void
    {
        $this->nbrParticipants = $nbrParticipants;
    }

    public function getPlacesDispo(): int
    {
        return $this->placesDispo;
    }
    public function setPlacesDispo(int $placesDispo): void
    {
        $this->placesDispo = $placesDispo;
    }

    public function getNumThemeFormation(): int
    {
        return $this->numThemeFormation;
    }
    public function setNumThemeFormation(int $numThemeFormation): void
    {
        $this->numThemeFormation = $numThemeFormation;
    }

    public function getNumNiveauFormation(): int
    {
        return $this->numNiveauFormation;
    }
    public function setNumNiveauFormation(int $numNiveauFormation): void
    {
        $this->numNiveauFormation = $numNiveauFormation;
    }

    public function getNumModalitesFormation(): int
    {
        return $this->numModalitesFormation;
    }
    public function setNumModalitesFormation(int $numModalitesFormation): void
    {
        $this->numModalitesFormation = $numModalitesFormation;
    }

    public function getNumLieuFormation(): int
    {
        return $this->numLieuFormation;
    }
    public function setNumLieuFormation(int $numLieuFormation): void
    {
        $this->numLieuFormation = $numLieuFormation;
    }


    public function showFormations()
    {
        $query = "select * from " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function filterFormationByLevel($idNiv)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE idNiveauFormation = :idNiv";
        $stmt = $this->conn->prepare($query); 
        $stmt->bindParam(":idNiv", $idNiv);
        $stmt->execute();

        return $stmt;
    }

    public function selectFormationById($id)
    {
        $query = "SELECT nomFormation, descriptionFormation, prixTTC, placesDispo, libelleNiveau FROM " . $this->table_name . " JOIN niveauformation ON niveauformation.id = idNiveauFormation WHERE " .$this->table_name. ".id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $stmt;
    }
}

?>