<!DOCTYPE html>
<html>
<head>
    <title>Peta Leaflet + Geoserver + Sleman</title>
    <meta charset="utf-8">

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <style>
        #map { width: 100%; height: 600px; }
    </style>
</head>

<body>
<div id="map"></div>

<script>
var map = L.map("map").setView([-7.68, 110.36], 12);

var osm = L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png").addTo(map);

// ================= LOCAL GEOSERVER ====================
var gsURL = "http://localhost:8080/geoserver/wms";

var wmsKecamatan = L.tileLayer.wms(gsURL, {
    layers: "pgweb:data_kecamatan_view",
    format: "image/png",
    transparent: true,
    opacity: 0.5
}).addTo(map);

var wmsGunungkidul = L.tileLayer.wms(gsURL, {
    layers: "pgweb:Gunungkidul",
    format: "image/png",
    transparent: true,
    opacity: 0.5
}).addTo(map);

var wmsJalanGunungkidul = L.tileLayer.wms(gsURL, {
    layers: "pgweb:Jalan_Gunungkidul",
    format: "image/png",
    transparent: true
}).addTo(map);

// ================= SLEMAN WMS =========================
var slemanURL = "https://geoportal.slemankab.go.id/geoserver/geonode/wms";

var wmsJalanSleman = L.tileLayer.wms(slemanURL, {
    layers: "geonode:jalan_ln",
    format: "image/png",
    transparent: true
}).addTo(map);

var wmsMalariaSleman = L.tileLayer.wms(slemanURL, {
    layers: "geonode:kasus_malaria_2025_semester1",
    format: "image/png",
    transparent: true
}).addTo(map);

// ================= LAYER CONTROL ======================
var overlayMaps = {
    "Kecamatan": wmsKecamatan,
    "Batas Gunungkidul": wmsGunungkidul,
    "Jalan Gunungkidul": wmsJalanGunungkidul,
    "Jalan Sleman": wmsJalanSleman,
    "Kasus Malaria Sleman": wmsMalariaSleman
};

L.control.layers({ "OpenStreetMap": osm }, overlayMaps, { collapsed:false }).addTo(map);

L.control.scale().addTo(map);

map.on("click", function(e){
    L.popup()
        .setLatLng(e.latlng)
        .setContent("Koordinat:<br>" + e.latlng.lat.toFixed(6) + ", " + e.latlng.lng.toFixed(6))
        .openOn(map);
});
</script>

</body>
</html>
