var mymap = L.map('map').setView([19.5126, -98.8798], 13);
const tilesProvider = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'
L.tileLayer(tilesProvider, {
    maxZoom: 15,
    minZoom: 13
}).addTo(mymap);
let marker = L.marker([19.5126, -98.8798]).addTo(mymap);
