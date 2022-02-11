<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Administration</title>
        <?php include "parts/head.php"?>
    </head>
    <body class="administration">

        <!-- barre de navigation -->
        <?php include "parts/barreNavigation.php"?>

             <!-- Administration-->
             <header>
                 <!-- deconnexion -->
                 <div class="deconnexion">
                     <div>
                         <p>Bienvenue <?=$utilisateur["prenom"]?> <?=$utilisateur["nom"]?></p>
                     </div>
                     <div class="bouton-deconnexion">
                         <a href="deconnexion-admin">Déconnexion</a>
                     </div>
                 </div>

                 <div class="col-lg d-flex align-items-center flex-column conteneur conteneur-admin">
                    <h1>Administration</h1>

                    <!-- Bouton: ajout une épisode-->
                    <div class="bouton-ajout bouton-ajout-episode">
                    <a href="ajouter-episode">Ajouter une épisode</a>
                    </div>

                    <!-- Bouton: ajout un utilisateur-->
                    <div class="bouton-ajout bouton-ajout-utilisateur">
                    <a href="ajouter-utilisateur">Ajouter un utilisateur</a>
                    </div>
                 </div>
             </header>

             <!-- Liste des utilisateurs -->
             <section class="boite-centrer section-admin">
                <h2>Liste des utilisateurs</h2>
                <?php 
                    foreach($utilisateurs as $utilisateur){?>

                        <div class="col-lg d-flex align-items-start conteneur-utilisateur">
                            <p class="prenom-utilisateur"><?=$utilisateur['prenom']?> <?=$utilisateur['nom']?></p>

                            <!-- Bouton: supprimer utilisateur par id--> 
                            <div class="bouton-supprimer-utilisateur">
                                <a class="bt-supprimer-confirm" href="supprimer-utilisateur?id=<?=$utilisateur['id']?>">Supprimer</a>
                            </div>
                            
                            <!-- Bouton: modifier un utilisateur-->
                            <div class="bouton-modifier bouton-modifier-utilisateur">
<<<<<<< HEAD
                                <a href="modifier-utilisateur?utilisateur_id=<?=$utilisateur['id']?>">Modifier</a>
=======
                            <a href="modifier-utilisateur?utilisateur_id=<?=$utilisateur['id']?>">Modifier</a>
>>>>>>> 1ab67e1807b973ed99d284a8e8ff82efe703333c
                            </div>
                        </div>
                <?php }?>
             </section>

             <!-- Liste des épisodes -->
             <section class="boite-centrer section-episodes">
                <h2>Liste des épisodes</h2>
                <?php 
                    foreach($episodes as $episode){?>
                <div class="col-lg d-flex align-items-start conteneur-episode">
                    <p class="episode"><?=$episode['titre']?></p>

                    <!-- Bouton: supprimer épisode par id--> 
                    <div class="bouton-supprimer-episode">
                         <a class="bt-supprimer-episode-confirm" href="supprimer-episode?id=<?=$episode['id']?>">Supprimer</a>
                     </div>

                    <!-- Bouton: modifier épisode-->
                    <div class="bouton-modifier-episode">
                        <a href="modifier-episode?episode_id=<?=$episode['id']?>">Modifier</a>
                    </div>                   
                </div>
                <?php }?>
             </section>
             <?php include "parts/footerAdmin.php"?>
    </body>
</html>