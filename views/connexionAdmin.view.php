<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Connexion administration</title>
        <?php include "parts/head.php"?>
    </head>
    <body class="page-formulaire connexion-admin">
       
        <!-- barre de navigation -->
        <?php include "parts/barreNavigation.php"?>
         
        <header>
             
            <!-- Formulaire connexion administration -->
            <section class="formulaire formulaire-centrer section-formulaire-admin">
                <h3 class="card-header titre titre-marge titre-formulaire-admin">Connexion Administration</h3>

                <?php 
                    // verifie si un erreur est déclarer. Si oui, un message d'erreur s'affiche.
                    if(isset($_GET["erreur"])){?>
                    <div class="erreur erreur-connexion">
                        <p>
                            Les informations de connexion fournies sont inexactes.
                        </p>
                    </div>
                <?php }?>
            
                <div class="card conteneur-formulaire conteneur-formulaire-admin">
                    <div class="card-body boite-formulaire boite-formulaire-admin">
                        <form action="admin-submit" method="POST">
                          <div>
                              <label>Courriel</label>
                              <input type="text" name="courriel" required>
                          </div>
                          <div>
                              <label>Mot de Passe</label>
                              <input type="password" name="mot_de_passe" required>
                          </div>
                          <div class="bouton-submit">
                              <input type="submit" name="submit" value="Se connecter">
                        </div>
                        </form>
                    </div>
                </div>
            </section>

            <!-- Bouton: redirige vers la page d'accueil-->
            <div class="bouton-retour bouton-retour-accueil">
            <a href="accueil">Retourner à l'accueil</a>
            </div>

        </header>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>