<?php

require_once "bases/BaseController.php";
require_once "models/Episodes.php";
require_once "models/Auditeurs.php";
require_once "models/Utilisateurs.php";
require "utils/Upload.php";

class SiteController extends BaseController
{

    // controller de la page d'accueil
    public function accueil()
    {
        
        $model_accueil = new Episodes();
        $episodes = $model_accueil->tous();

        include "views/accueil.view.php";
    }

    // controller de la validation de l'infolettre
    public function infolettreSubmit(){
        
        $formEnvoye = isset($_POST["submit"]);

        if ($formEnvoye) {

            $prenom = $_POST["prenom"];
            $nom = $_POST["nom"];
            $courriel = $_POST["courriel"];

            $auditeur = new Auditeurs();
            $success = $auditeur->creer($prenom, $nom, $courriel);

            if ($success) {
                //redirection à la page admin
                header("location:accueil");
                exit();
            } else {
                //redirection à la page d"ajout d'activité avec paramètre GET erreur=1
                header("location:accueil?erreur=1");
                exit();
            }

        } else {
            header("location:accueil?erreur=1");
            exit();
        }

        exit();

    }

    // controller de la page qui sommes-nous?
    public function quiSommesNous(){
        include "views/quiSommesNous.view.php";
    }

    // controller de la page de connexion administration
    public function connexionAdmin(){

        include "views/connexionAdmin.view.php";
    }

    // controller de la validation de connexion a l'administration
    public function adminSubmit(){

        // verifie si le "submit" est déclaré
        $estEnvoye = isset($_POST["submit"]);

        if ($estEnvoye) {
            
            $courriel = $_POST["courriel"];
            $mot_de_passe = $_POST["mot_de_passe"];

            $utilisateur = new Utilisateurs();
            $success = $utilisateur->verifierConnexion($courriel, $mot_de_passe);

            // si verification bonne ou non
            if ($success) {
                //rediriger vers la page admin
                header("location:./administration");
            } else {
                // sinon redirige à la page connexion avec ?erreur -> + message d'erreur
                header("location:./connexion-admin?erreur=1");
                exit();
            }

            // si le "submit" n'a pas été déclaré retour à l'accueil avec ?erreur
        } else {
            header("location:./connexion-admin?erreur=1");
            exit();
        }

        
    }

    // controller verificateur de connection: si pas connecter retour à la page d'accueil
    public function verifierConnexion() {
        if (!isset($_SESSION["utilisateur_id"])){
            
            header("location:accueil");
            exit();
        }
    }
    
    // controller de la page administration
    public function administration(){
        $this->verifierConnexion();
        
        $id = $_SESSION["utilisateur_id"];

        $model_admin = new Utilisateurs();
        $utilisateur = $model_admin->parId($id);
        
        
        $model_admin = new Utilisateurs();
        $utilisateurs = $model_admin->tous();
        
        $model_episode = new Episodes();
        $episodes = $model_episode->tous();
        
        
        include "views/administration.view.php";
    }

    // controller déconnecter l'administrateur
    public function deconnexionAdminSubmit(){
        unset($_SESSION["utilisateur_id"]);
        
        header("location:accueil");
        exit();
    }

    // controller du formulaire d'ajout d'une épisode
    public function ajouterEpisode(){

        $this->verifierConnexion();

        include "views/ajouterEpisode.view.php";
    }

    // controller de la validation de l'ajout d'une épisode
    public function episodeSubmit(){

        $formEnvoye = isset($_POST["submit"]);

        if( $formEnvoye){

            $titre = $_POST["titre"];
            $description = $_POST["description"];
            $date = $_POST["date"];
            $duree = $_POST["duree"];

            //image
            $upload = new Upload("image");
            $image = $upload->placerDans("public/uploads");

            //vidéo
            $upload = new Upload("video");
            $video = $upload->placerDans("public/uploads");

            //instance de Episode
            $episode = new Episodes();
            //->creer()
            $success = $episode->creer($titre, $description, $date, $duree, $image, $video);

            if($success){
                header("location:./administration");
                exit();
            }else{
                header("location:ajouter-episode?erreur=1");
                exit();
            }

        }else{
            header("location:ajouter-episode?erreur=1");
            exit();
        }


    }

    // controller pour supprimer un episode par id de la page administration
    public function supprimerEpisode(){
        // Id de l'episode à supprimer
        $id = $_GET["id"];

        $model_episode = new Episodes();
        $suppression = $model_episode->supprimerParId($id);

        header("location: administration");
        exit();
    }

    // controller du formulaire modifer une épisode
    public function modifierEpisode(){

        $this->verifierConnexion();

        $id = $_GET["episode_id"];

        $modif_episode = new Episodes();
        $episode = $modif_episode->parId($id);

        include "views/modifierEpisode.view.php";
    }

    // controller validation de la modification de l'épisode
    public function modifierSubmit(){
        
        // verifie si le "submit" est déclaré
        $estEnvoye = isset($_POST["submit"]);

        if ($estEnvoye) {


            $titre = $_POST["titre"];
            $description = $_POST["description"];
            $date = $_POST["date"];
            $duree= $_POST["duree"];

            //image
            $upload = new Upload("image");
            $image = $upload->placerDans("public/uploads");

            //vidéo
            $upload = new Upload("video");
            $video = $upload->placerDans("public/uploads");

            $id = $_POST["id"];

            //instance de Episode
            $episode = new Episodes();
            
            $success = $episode->modificationEpisode($titre, $description, $date, $duree, $image, $video, $id);

            //Redirection vers administration
            if($success){
                header("location:administration");
                exit();
            // erreur redirection au formulaire
            }else{
                header("location: modifier-episode?erreur=1&episode_id=$id");
            }
        }
    }

    // controller du formulaire d'ajout d'un utilisateur à la page administration
    public function ajouterUtilisateur(){

        $this->verifierConnexion();

        include "views/ajouterUtilisateur.view.php";
    }

    // controller de la validation de l'ajout d'un utilisateur
    public function utilisateurSubmit(){

        $formEnvoye = isset($_POST["submit"]);

        if( $formEnvoye){

            $prenom = $_POST["prenom"];
            $nom = $_POST["nom"];
            $courriel = $_POST["courriel"];
            // password_hash = fonction & PASSWORD_DEFAULT = encryptage php a jour
            $mot_de_passe = password_hash($_POST["mot_de_passe"], PASSWORD_DEFAULT);
            
            $utilisateur = new Utilisateurs();
            $success = $utilisateur->creer($prenom, $nom, $courriel, $mot_de_passe);

            if($success){ 
                //redirection à la administration
                header("location:administration");
                exit();
            }else{
                //redirection à la page de création avec paramètre GET erreur=1
                header("location:ajouter-utilisateur?erreur=1");
                exit();
            }

        }else{
            header("location:ajouter-utilisateur?erreur=1");
            exit();
        }
 
        exit();

    }

  // controller du formulaire modifer un utilisateur
  public function modifierUtilisateur(){

    $this->verifierConnexion();

    $id = $_GET["utilisateur_id"];

    $modif_utilisateur = new Utilisateurs();
    $utilisateur = $modif_utilisateur->parId($id);

    include "views/modifierUtilisateur.view.php";
}

// controller validation de la modification de l'utilisateur
public function modifUserSubmit(){
        
    // verifie si le "submit" est déclaré
    $estEnvoye = isset($_POST["submit"]);

    if ($estEnvoye) {


        $prenom = $_POST["prenom"];
        $nom = $_POST["nom"];
        $courriel = $_POST["courriel"];
        $mot_de_passe= password_hash($_POST["mot_de_passe"], PASSWORD_DEFAULT);

        $id = $_POST["id"];

        //instance de Utilisateur
        $utilisateur = new Utilisateurs();
        
        $success = $utilisateur->modificationUtilisateur($prenom, $nom, $courriel, $mot_de_passe, $id);

        //Redirection vers administration
        if($success){
            header("location:administration");
            exit();
        // erreur redirection au formulaire
        }else{
            header("location: modifier-utilisateur?erreur=1&utilisateur_id=$id");
        }
    }
}
    
    // controller pour supprimer un utilisateur par id de la page administration
    public function supprimerUtilisateur(){

        // Id de l'utilisateur à supprimer
        $id = $_GET["id"];

        $model_utilisateur = new Utilisateurs();
        $suppression = $model_utilisateur->supprimerParId($id);

        header("location: administration");
        exit();

    }
}
