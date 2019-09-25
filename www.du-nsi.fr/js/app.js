let carte = L.map('mapid').setView([47.6, 2.5], 6);

L.tileLayer('https://{s}.tile.openstreetmap.se/hydda/base/{z}/{x}/{y}.png', {
   maxZoom: 18,
   attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
   '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
   'Imagery (c) <a href="https://www.mapbox.com/">Mapbox</a>',
   id: 'mapbox.streets'
}).addTo(carte);

function marqueur(ville){
// insertion du marqueur pour Angers (latitude = 47.47073700, longitude = -0.55247200)
let marker = L.marker([ville.latitude,ville.longitude]);
// ajout à la carte
marker.addTo(carte);
//interaction avec le marqueur
marker.on('click', function(e) {
   document.getElementById('villedepart').value = ville.id;
})
// bulle avec texte
marker.bindTooltip(ville.libelle, {
    direction: "top",
    permanent: true,
    offset: [0,-15], // on décale un peu la bulle vers le haut,
    opacity: 0.6 // semi transparente
 }).openTooltip();
}

villes.forEach(marqueur);

   // on filtre  le tableau villes en cherchant
   // l'id de la ville 1
   // le tableau filtré est lui-même un tableau
   // dont nous ne voulons que la première valeur
   // d'où le [0] à la fin
function chemin(distance){
   let ville1 = villes.filter(function(ville){
       return ville.id===distance.villedepart_id
   })[0]
   // idem pour la deuxième ville
   let ville2 = villes.filter(function(ville){
       return ville.id===distance.villearrivee_id
   })[0]
  
   // on construit notre tableau de points
   // attendu par Polyline
   let latlngs = [
       [ville1.latitude, ville1.longitude],
       [ville2.latitude, ville2.longitude],
   ];
  
   // on affiche la ligne
   let polyline = L.polyline(latlngs, {color: 'grey'}).addTo(carte)
}


// on boucle sur la variable distances
distances.forEach(chemin)