<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modifier épisode</title>
        <?php include "parts/head.php"?>
    </head>
    <body class="page-formulaire modifier-episode">
        
        <!-- barre de navigation -->
        <?php include "parts/barreNavigation.php"?>
         
        <header>
             
            <!-- Formulaire modifier une épisode -->
            <section class="boite-centrer formulaire formulaire-centrer section-formulaire-modifier">
                <h3 class="card-header titre titre-marge titre-formulaire-modifier">Modifier une épisode</h3>

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
                        <form action="modifier-submit" method="POST" enctype="multipart/form-data">
                            <div>
                                <label>Titre</label>
                                <input type="text" name="titre" value="<?= $episode['titre']?>">
                            </div>
                            <div>
                                <label>Description</label>
                                <textarea name="description"><?= $episode['description']?></textarea>
                            </div>
                            <div>
                                <label>Date</label>
                                <input type="text" name="date" value="<?= $episode['date']?>">
                            </div>
                            <div>
                                <label>Durée</label>
                                <input type="text" name="duree" value="<?= $episode['duree']?>">
                            </div>
                            <div>
                                <label>Image</label>
                                <input type="file" name="image">
                            </div>
                            <div>
                                <label>Video</label>
                                <input type="file" name="video">
                            </div>
                            <p>* Assurez-vous de bien retélécharger votre image et vidéo.</p>
                            
                            <!-- N'apparaît pas dans le formulaire -->
                            <input type="hidden" name="id" value="<?= $episode["id"] ?>">
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