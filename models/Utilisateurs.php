<?php

require_once "bases/BaseModel.php";

class Utilisateurs extends BaseModel
{

    protected $table = "utilisateurs";

    // methode pour vérifier si la connexion est correct
    public function verifierConnexion($courriel, $mot_de_passe){

        // Lire le mot de passe encrypté associer au courriel
        $sql = "SELECT id, mot_de_passe
                FROM $this->table
                WHERE courriel = :courriel
        ";

        $stmt = $this->pdo()->prepare($sql);

        $stmt->execute([
            ":courriel" => $courriel,
        ]);

        $entree = $stmt->fetch();

        if($entree != false){
            //verifier si le mot de passe correspond
            $mdp_correspond = password_verify($mot_de_passe, $entree["mot_de_passe"]);

            if($mdp_correspond){
                $_SESSION["utilisateur_id"] = $entree["id"];    
            }    

            return $mdp_correspond;
        }else{
            return false;
        }
    }

    // methode pour créer un nouvel utilisateur admin
    public function creer($prenom, $nom, $courriel, $mot_de_passe){

        $sql = "INSERT INTO $this->table (prenom, nom, courriel, mot_de_passe)
                VALUES (:prenom, :nom, :courriel, :mot_de_passe);
                ";

        $stmt = $this->pdo() ->prepare($sql);
        $success = $stmt->execute([
            ":prenom" => $prenom,
            ":nom" => $nom,
            ":courriel" => $courriel, 
            ":mot_de_passe" => $mot_de_passe,
        ]);   

        return $success;

    }

    public function modificationUtilisateur($prenom, $nom, $courriel, $mot_de_passe, $id){
        
        $sql ="UPDATE $this->table
                SET                       
                    prenom = :prenom,
                    nom = :nom,
                    courriel = :courriel,
                    mot_de_passe = :mot_de_passe
                WHERE id = :id     
        ";

        $stmt = $this->pdo()->prepare($sql);
        $success = $stmt->execute([
            ":prenom" => $prenom,
            ":nom" => $nom,
            ":courriel" => $courriel,
            ":mot_de_passe" => $mot_de_passe,
            ":id" => $id,
        ]);

        return $success;
    }
    
}