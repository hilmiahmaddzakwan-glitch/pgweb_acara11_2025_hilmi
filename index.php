<!DOCTYPE html>
<html>
<head>
    <title>Peta Leaflet + Geoserver + Sleman</title>
    <meta charset="utf-8">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <!-- Plugin Leaflet-Geoserver -->
    <script src="https://raw.githack.com/iamtekson/leaflet-geoserver-request/master/src/L.Geoserver.js"></script>

    <style>
        #map {
            width: 100%;
            height: 600px;
        }
    </style>
</head>

<body>
    <div id="map"></div>

    <script>
        // =====================================================================
        // INISIALISASI MAP
        // =====================================================================
        var map = L.map("map").setView([-7.68, 110.36], 12);

        // Basemap
        var osm = L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            maxZoom: 19
        }).addTo(map);

        // =====================================================================
        // WMS GEOSERVER LOKAL
        // =====================================================================
        var wmsKecamatan = L.Geoserver.wms("http://localhost:8080/geoserver/wms", {
            layers: "pgweb:data_kecamatan_view",
            transparent: true,
            format: "image/png"
        });

        var wmsGunungkidul = L.Geoserver.wms("http://localhost:8080/geoserver/wms", {
            layers: "pgweb:Gunungkidul",
            transparent: true,
            format: "image/png"
        });

        var wmsJalanGunungkidul = L.Geoserver.wms("http://localhost:8080/geoserver/wms", {
            layers: "pgweb:Jalan_Gunungkidul",
            transparent: true,
            format: "image/png"
        });

        // =====================================================================
        // WMS DARI GEOPORTAL SLEMAN
        // =====================================================================
        var slemanWMSurl = "https://geoportal.slemankab.go.id/geoserver/geonode/wms";

        var wmsJalanSleman = L.Geoserver.wms(slemanWMSurl, {
            layers: "geonode:jalan_ln",
            transparent: true,
            format: "image/png"
        });

        var wmsMalariaSleman = L.Geoserver.wms(slemanWMSurl, {
            layers: "geonode:kasus_malaria_2025_semester1",
            transparent: true,
            format: "image/png"
        });

        // =====================================================================
        // TAMBAHKAN KE MAP SAAT AWAL
        // =====================================================================
        wmsKecamatan.addTo(map);
        wmsGunungkidul.addTo(map);
        wmsJalanGunungkidul.addTo(map);
        wmsJalanSleman.addTo(map);
        wmsMalariaSleman.addTo(map);

        // =====================================================================
        // CONTROL LAYERS
        // =====================================================================
        var baseMaps = {
            "OpenStreetMap": osm
        };

        var overlayMaps = {
            "Kecamatan": wmsKecamatan,
            "Batas Gunungkidul": wmsGunungkidul,
            "Jalan Gunungkidul": wmsJalanGunungkidul,
            "Jalan Sleman": wmsJalanSleman,
            "Kasus Malaria Sleman (2025 S1)": wmsMalariaSleman
        };

        L.control.layers(baseMaps, overlayMaps, { collapsed: false }).addTo(map);

        // =====================================================================
        // SKALA PETA
        // =====================================================================
        L.control.scale({ position: "bottomleft" }).addTo(map);

        // =====================================================================
        // POPUP KOORDINAT SAAT DIKLIK
        // =====================================================================
        map.on("click", function (e) {
            L.popup()
                .setLatLng(e.latlng)
                .setContent(
                    "Koordinat:<br>" +
                    e.latlng.lat.toFixed(6) + ", " +
                    e.latlng.lng.toFixed(6)
                )
                .openOn(map);
        });
    </script>
</body>
</html>
