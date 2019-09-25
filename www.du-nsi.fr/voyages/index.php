<?php
try {

   $pdo = new PDO('mysql:host=localhost;dbname=dunsivoyages', 'root', '');

   $statement = $pdo->prepare("SELECT * FROM villes ORDER BY libelle");
   $statement->execute();
   $villes = $statement->fetchAll(PDO::FETCH_ASSOC);

   /*echo '<pre>';var_dump($villes); echo '<pre>';
   die;*/

} catch (PDOException $e) {

   print "Erreur !: " . $e->getMessage() . "<br/>";
   die();
}
?>
<!doctype html>
<html lang="fr">
 <head>
   <!-- Quelques metas incontournables -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <title>Calcul du meilleur itinéraire</title>
     <!-- un favicon trouvé sur internet qui sera également le logo de notre application -->
     <link rel="shortcut icon" href="https://cdn2.iconfinder.com/data/icons/on-point-social-media/141/Maps-512.png">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
     integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
     crossorigin=""/>

     <!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
crossorigin=""></script>
     <link rel="stylesheet" href="css/app.css">
     <script src="js/app.js" defer></script>
    </head>
    
    <body>
 <!-- bloc de contenu principal -->
 <div class="main-content">

 <!-- la barre de navigation (qui ne servira à rien dans notre application) -->
 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
        <img src="https://cdn2.iconfinder.com/data/icons/on-point-social-media/141/Maps-512.png" width="30" height="30" alt="">
    </a>
 
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Lien 2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Lien 1</a>
            </li>
        </ul>
    </div>
 </nav>
 


 <!-- conteneur principal -->
 <div class="container">
     <!-- titre principal -->
     <h1>Calculez votre itinéraire</h1>

     <!-- message informatif -->
     <div class="row information">
        <div class="col-12">
            <div class="alert alert-secondary" role="alert">
                Pour trouver un itinéraire, cliquez sur 2 marqueurs de la carte ou choisissez 2 villes dans les listes de sélection.
            </div>
        </div>
     </div>

     <div class="container-de-colonnage">
         <!-- première colonne : accueillera la carte -->
         <div class="row">

            <div class="col-md-8">
                <div id="mapid"></div>
            </div>
         
            <div class="col-md-4">

         <!-- deuxième colonne -->
         <div class="colonne">
             <!-- formulaire pour pouvoir poster nos choix de villes -->
             <form>
                <label for="villedepart">Aller de :</label>
                <select class="form-control" id="villedepart" name="villedepart">
                        <?php foreach($villes as $key=>$ville) : ?>
                            <option value="<?=$ville['id']?>"><?=$ville['libelle']?></option>
                        <?php endforeach ?>
                </select>
                <small>Choisissez une ville de départ</small>

                <label for="villearrivee">àaaa :</label>
                <select class="form-control" id="villearrivee" name="villearrivee">
                        <?php foreach($villes as $key=>$ville):?>
                                <option value="<?=$ville['id']?>"><?=$ville['libelle']?></option>
                        <?php endforeach?>
                </select>
                <small>Choisissez une ville d’arrivée</small>

                 <button type="submit">Trouver l'itinéraire le plus court&nbsp; &rarr;</button>
             </form>
             
             <!-- Conteneur pour afficher le résultat -->
             <div class="resultat"></div>
         </div>
     </div>

 </div>
</div>

  <!-- Pied de page -->
  <footer>
   <div class="container">
       <div class="row">
           <div class="col">
               <a href="">@copyright Joachim Lucas 2019</a>
           </div>
       </div>
   </div>
  </footer>

 </body>
</html>