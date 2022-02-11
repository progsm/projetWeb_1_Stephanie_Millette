<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ajouter Episode</title>
        <?php include "parts/head.php"?>
    </head>
    <body class="page-formulaire ajouter-episode">

       <!-- barre de navigation -->
       <?php include "parts/barreNavigation.php"?>
         
        <header>
             
            <!-- Formulaire ajouter une épisode -->
            <section class="boite-centrer formulaire formulaire-centrer section-formulaire-episode">
                <h3 class="card-header titre titre-marge titre-formulaire-episode">Ajouter une épisode</h3>

                <?php 
                    // verifie si un erreur est déclarer. Si oui, un message d'erreur s'affiche.
                    if(isset($_GET["erreur"])){?>
                    <div class="erreur">
                        <p>
                            Une erreur est survenue.
                        </p>
                    </div>
                <?php }?>

                <div class="card conteneur-formulaire conteneur-formulaire-episode">
                    <div class="card-body boite-formulaire boite-formulaire-episode">
                        <form action="episode-submit" method="POST" enctype="multipart/form-data">
                            <div>
                                <label>Titre</label>
                                <input type="text" name="titre" required>
                            </div>
                            <div>
                                <label>Description</label>
                                <textarea name="description" required></textarea>
                            </div>
                            <div>
                                <label>Date</label>
                                <input type="text" name="date" placeholder="aaaa-mm-jj" required>
                            </div>
                            <div>
                                <label>Durée</label>
                                <input type="text" name="duree" required>
                            </div>
                            <div>
                                <label>Image</label>
                                <input type="file" name="image" required>
                            </div>
                            <div>
                                <label>Video</label>
                                <input type="file" name="video" required>
                            </div>
                            <div class="bouton-submit">
                                <input type="submit" name="submit" value="Ajouter">
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