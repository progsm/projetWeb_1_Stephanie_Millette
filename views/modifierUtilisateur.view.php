<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modifier Utilisateur</title>
        <?php include "parts/head.php"?>
    </head>
    <body class="page-formulaire modifier-utilisateur">
        
        <!-- barre de navigation -->
        <?php include "parts/barreNavigation.php"?>
         
        <header>
             
            <!-- Formulaire modifier une épisode -->
            <section class="boite-centrer formulaire formulaire-centrer section-formulaire-modifier">
                <h3 class="card-header titre titre-marge titre-formulaire-modifier">Modifier un utilisateur</h3>

                <?php 
                    // verifie si un erreur est déclarer. Si oui, un message d'erreur s'affiche.
                    if(isset($_GET["erreur"])){?>
                    <div class="erreur">
                        <p>
                            Une erreur est survenue.
                        </p>
                    </div>
                <?php }?>

                <div class="card conteneur-formulaire conteneur-formulaire-modifier">
                    <div class="card-body boite-formulaire boite-formulaire-modifier">
                        <form action="modif-user-submit" method="POST" enctype="multipart/form-data">
                            <div>
                                <label>Prénom</label>
                                <input type="text" name="prenom" value="<?= $utilisateur['prenom']?>">
                            </div>
                            <div>
                                <label>Nom</label>
                                <input type="text" name="nom" value="<?= $utilisateur['nom']?>"></input>
                            </div>
                            <div>
                                <label>Courriel</label>
                                <input type="text" name="courriel" value="<?= $utilisateur['courriel']?>">
                            </div>
                            <div>
                                <label>Mot de passe</label>
                                <input type="password" name="mot_de_passe" value="<?= $utilisateur['mot_de_passe']?>">
                            </div>
                            <!-- N'apparaît pas dans le formulaire -->
                            <input type="hidden" name="id" value="<?= $utilisateur['id']?>">
                            <div class="bouton-submit">
                                <input type="submit" name="submit" value="Modifer">
                            </div>
                        </form>
                    </div>
                </div>
            </section>

            <!-- Bouton: redirige vers la page administration-->
            <div class="bouton-retour bouton-retour-admin">
            <a href="administration">Retour</a>
            </div>

        </header>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>