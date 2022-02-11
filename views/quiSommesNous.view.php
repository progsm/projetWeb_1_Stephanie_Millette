<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Qui sommes nous?</title>
        <?php include "parts/head.php"?>
    </head>
    <body class="qui-sommes-nous">
        
        <!-- barre de navigation -->
        <?php include "parts/barreNavigation.php"?>    
             
         <!-- Histoire de la compagnie-->
         <header>
             <div class="col-lg d-flex align-items-center flex-column conteneur conteneur-intro">
                <h1>Notre Histoire</h1>
                <p>
                Depuis maintenant 20 ans, Cinéma fait maison contribue au développement culturel du Québec en faisant la production de Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis enim lobortis scelerisque fermentum dui faucibus in ornare. Enim ut tellus elementum sagittis vitae et leo. Aliquam sem et tortor consequat id porta. Leo duis ut diam quam nulla porttitor. Et netus et malesuada fames ac turpis egestas. Ac odio tempor orci dapibus ultrices in iaculis. Et tortor consequat id porta nibh venenatis cras. Adipiscing enim eu turpis egestas. Elit scelerisque mauris pellentesque pulvinar pellentesque habitant. 
                </p>
             </div>
         </header>
         <!-- Équipe de production -->
         <section class="boite-centrer section-equipe">
            <div class="col-lg d-flex align-items-center flex-column conteneur conteneur-equipe">
                <h2>Notre équipe de production</h2>
                <h3>Producteur/réalisateur</h3>
                <p>Alain Leclient</p>
                <h3>Directeur Photo</h3>
                <p>Serge Lamontagne</p>
                <h3>Monteur/Preneur de son</h3>
                <p>Simon Bernier</p>
                <h3>Assistante de plateau</h3>
                <p>Sabrina Meunier</p>
                <hr>
            </div>
         </section>
         <!-- Formulaire Infolettre -->
         <section class="formulaire section-infolettre">
             <h3 class="card-header titre titre-infolettre">Infolettre</h3>
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
        
    
   
