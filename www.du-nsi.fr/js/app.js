let carte = L.map('mapid').setView([47.6, 2.5], 6);

L.tileLayer('https://{s}.tile.openstreetmap.se/hydda/base/{z}/{x}/{y}.png', {
   maxZoom: 18,
   attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
   '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
   'Imagery (c) <a href="https://www.mapbox.com/">Mapbox</a>',
   id: 'mapbox.streets'
}).addTo(carte);

// insertion du marqueur pour Angers (latitude = 47.47073700, longitude = -0.55247200)
let marker = L.marker([47.47073700, -0.55247200]);
// ajout à la carte
marker.addTo(carte);
// bulle avec texte
marker.bindTooltip('Angers', {
    direction: "top",
    permanent: true,
    offset: [0,-15], // on décale un peu la bulle vers le haut,
    opacity: 0.6 // semi transparente
 }).openTooltip();
 