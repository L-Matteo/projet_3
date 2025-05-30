<?php

class Stagiaire {
    private $conn; 
    private $table_name = "stagiaire";

    private $nomStagiaire;
    private $prenomStagiaire; 
    private $mailStagiaire; 
    private $telStagiaire; 
    private $login; 
    private $password; 

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function __destruct(){}

    public function getNomStagiaire():String 
    {
        return $this->nomStagiaire;
    }

    public function setNomStagiaire($nomStagiaire)
    {
        $this->nomStagiaire = $nomStagiaire;
    }

    public function getPrenomStagiaire():String 
    {
        return $this->prenomStagiaire;
    }

    public function setPrenomStagiaire($prenomStagiaire)
    {
        $this->prenomStagiaire = $prenomStagiaire;
    }

    public function getMailStagiaire():String 
    {
        return $this->mailStagiaire;
    }

    public function setMailStagiaire($mailStagiaire)
    {
        $this->mailStagiaire = $mailStagiaire;
    } 

    public function getTelStagiaire():String 
    {
        return $this->telStagiaire;
    }

    public function setTelStagiaire($telStagiaire)
    {
        $this->telStagiaire = $telStagiaire;
    }

    public function getLogin():String 
    {
        return $this->login; 
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function getPassword():String
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }


    public function createAccount() {

        try {
            $query = "insert into " .$this->table_name. "(nomStagiaire, prenomStagiaire, mailStagiaire, telStagiaire, login, password) values(:nom, :prenom, :mail, :tel, :login, :password)"; 
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":nom", $this->nomStagiaire);
            $stmt->bindParam(":prenom", $this->prenomStagiaire);
            $stmt->bindParam(":mail", $this->mailStagiaire);
            $stmt->bindParam(":tel", $this->telStagiaire);
            $stmt->bindParam(":login", $this->login);
            $stmt->bindParam(":password", $this->password);
            $stmt->execute();

            return $stmt;
        } catch(PDOException $e) {
            echo "Erreur lors de la création du compte : " . $e->getMessage();
            return false;
        }
    }

    public function connexion($mail) { 

        try {
            $query = "select id, nomStagiaire, prenomStagiaire, password from " .$this->table_name. " where mailStagiaire = :mail";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":mail", $mail);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);;
        } catch(PDOException $e) {
            echo "Erreur lors de la connexion : " . $e->getMessage();
            return false;
        }
    }
}

?>