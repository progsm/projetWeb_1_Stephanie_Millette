<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Accueil</title>
        <?php include "parts/head.php"?>
    </head>
    <body class="accueil">

        <!-- barre de navigation -->
        <?php include "parts/barreNavigation.php"?>

        <!-- header titre, sous-titre et resumer-->
        <header>
            <div class="col-lg d-flex align-items-center flex-column conteneur conteneur-intro">
                <h1>Mini Web-serie <br> La vie entre quatre murs</h1>
                <h2>SUIVEZ LES MÉSAVENTURES DES TREMBLAY EN PLEIN CONFINEMENT</h2>
                <p>
                    En pleine période de confinement, les Tremblay, une famille de cinq lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. In iaculis nunc sed augue lacus viverra vitae congue. Sed arcu non odio euismod lacinia at quis risus sed. Nibh ipsum consequat nisl vel pretium lectus quam. Pellentesque nec nam aliquam sem et. Velit egestas dui id ornare arcu odio. Tristique senectus et netus et malesuada fames ac turpis. Lorem dolor sed viverra ipsum nunc aliquet bibendum enim facilisis. Tortor vitae purus faucibus ornare suspendisse. Consequat interdum varius sit amet mattis vulputate. Aliquam purus sit amet luctus venenatis lectus. Eget nunc scelerisque viverra mauris in aliquam sem. Pellentesque elit eget gravida cum sociis natoque penatibus et. Molestie at elementum eu facilisis sed odio morbi quis. Volutpat sed cras ornare arcu dui. Vitae nunc sed velit dignissim sodales ut eu. Sit amet luctus venenatis lectus magna fringilla urna porttitor.
                </p>
            </div>
        </header>

        
            <!-- affiche les miniature des épisodes et vidéo -->
            <section class="row videos">
                <?php
                    foreach($episodes as $episode){?>
                <div class="col-3 card fiche" style="width: 18rem;">
                    <div class="card-body en-tete-fiche">
                        <h5 class="titre-episode"><?=$episode['titre']?></h5>
                        <p class="date-sorti"><?=$episode['date']?></p>
                    </div>
                    <img src="<?=$episode['image']?>" alt="">
                    <div class="descriptions overlay">
                        <!-- Bouton pop-up vidéo data-bs-target="#exampleModal" voir commentaire "model" id="exampleModal"-->
                        <div class="fond-bouton-overlay">
                            <button type="button" class="btn btn-primary bouton-play" data-bs-toggle="modal" data-bs-target="#exampleModal<?=$episode['id']?>">
                            Cliquer pour visionner
                            </button>
                        </div>
                        <p class="description"><?=$episode['description']?></p>
                        <p class="duree">Durée: <?=$episode['duree']?></p>
                    </div>
                </div>
                <!-- model -->
                <div class="modal fade" id="exampleModal<?=$episode['id']?>" >
                    <div class="modal-dialog">
                        <div class="modal-content conteneur-video">
                            <div class="modal-body">
                                <p><?=$episode['titre']?></p>
                                <video src="<?=$episode['video']?>" width="100%" controls autoplay></video>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
            </section>

            <!-- Commanditaires -->
            <section>
            <div class="col-lg d-flex align-items-center flex-column conteneur-commanditaire">
                    <h2>FIÈREMENT COMMANDITÉ PAR</h2>
                    <div class="row logos-commanditaire">
                        <div class="col-2 logo-assurance">
                            <img src="public/images/logo_assurance.svg" height="100" alt="">
                        </div>
                        <div class="col-8 logo-banque">
                            <img src="public/images/logo_banque.svg" height="100" alt="">
                        </div>
                        <div class="col-2 logo-reno">
                            <img src="public/images/logo_reno.svg" height="100" alt="">
                        </div>
                    </div>
                </div>
            </section>

            <!-- Formulaire Infolettre --> 
            <section class="formulaire section-infolettre">
                <h3 class="card-header titre titre-infolettre">Infolettre</h3>
            
                <!--si GET erreur est = true afficher ce message d'erreur  -->
                <?php if (isset($_GET["erreur"])) {?>
                    <div class="erreur">
                        <p>
                            Une erreur est survenue.
                        </p>
                    </div>
                <?php }?>

                <div class="card conteneur-formulaire conteneur-infolettre">
                    <div class="card-body boite-formulaire boite-infolettre">
                        <p class="card-text">Restez informé sur la sortie des derniers épisodes</p>
                        <form action="infolettre-submit" method="POST">
                            <div>
                                <label>Prénom</label>
                                <input type="text" name="prenom" required>
                            </div>
                            <div>
                                <label>Nom</label>
                                <input type="text" name="nom" required>
                            </div>
                            <div>
                                <label>Courriel</label>
                                <input type="text" name="courriel" required>
                            </div>
                            <div>
                                <input type="submit" name="submit" value="S'abonner">
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        
        <!-- footer + reseaux sociaux -->
        <?php include "parts/footer.php"?>
