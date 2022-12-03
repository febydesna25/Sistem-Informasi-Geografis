<html>

<head>
    <title>Payakumbuh</title>
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
    <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
    <script type="text/javascript" src="payakumbuh.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        #map {
            width: 600px;
            height: 400px;
        }
    </style>
    <style>
        #map {
            width: 800px;
            height: 500px;
        }

        .info {
            padding: 6px 8px;
            font: 14px/16px Arial, Helvetica, sans-serif;
            background: white;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        .info h4 {
            margin: 0 0 5px;
            color: #777;
        }

        .legend {
            text-align: left;
            line-height: 18px;
            color: #555;
        }

        .legend i {
            width: 18px;
            height: 18px;
            float: left;
            margin-right: 8px;
            opacity: 0.7;
        }
    </style>
</head>

<body>         
        <div class="row"> <!-- class row digunakan sebelum membuat column  -->
            <div class="col -4"> <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat sebesar 4 kolom-->
                <div class="jumbotron"> <!-- untuk membuat semacam container berwarna abu -->
                <h1>Add Location</h1>
                <hr>
                    <form action="proses.php" method="post">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Latitude, Longitude</label>
                            <input type="text" class="form-control" id="latlong" name="latlong">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Tempat</label>
                            <input type="text" class="form-control" name="nama_tempat">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Kategori Tempat</label>
                            <select class="form-control" name="kategori" id="">
                                <option value="">--Kategori Tempat--</option>
                                <option value="Rumah Sakit">Rumah Sakit</option>
                                <option value="Rumah Sakit Umum">Rumah Sakit Umum</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Keterangan</label>
                            <textarea class="form-control" name="keterangan" cols="30" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info">Add</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-8"> <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat sebesar 4 kolom-->
                <!-- peta akan ditampilkan dengan id = mapid -->
                <div id="map"></div>
            </div>
        </div>
        <script>
        // Creating map options
        var mapOptions = {
            center: [-0.20477621842136615, 100.61661253030464],
            zoom: 11
        }
        // Creating a map object
        var map = new L.map('map', mapOptions);

        // Creating a Layer object
        var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');

        // Adding layer to the map
        map.addLayer(layer);

        // control that shows state info on hover
        var info = L.control();

        var iconOptions = {
        iconUrl : 'pyk1.png',
        iconSize : [20,20]
    }

    var customIcon = L.icon(iconOptions);
	
	//creating a marker
	var markerOptions = {
		title: "MyLocations",
		clickable: true,
		draggable: true,
        icon : customIcon
	}
    //creating a marker
	var marker = L.marker([-0.2587187241995824, 100.60841791107569], markerOptions);
    marker.bindPopup('Kantor Wali Kota Payakumbuh').openPopup();
	
	//adding marker to the map
	marker.addTo(map);

        info.onAdd = function(map) {
            this._div = L.DomUtil.create('div', 'info');
            this.update();
            return this._div;
        };

        info.update = function(props) {
            this._div.innerHTML = '<h5>Peta Persebaran SMA, SMK Negeri Kota Payakumbuh</h5>' + (props ?
                '<b>' + props.NAMOBJ + '</b><br />' :
                'Arahkan Kursor ke Tujuan');
        };

        info.addTo(map);

        var basemaps = {
            Topography: L.tileLayer.wms('http://ows.mundialis.de/services/service?', {
                layers: 'TOPO-WMS'
            }),

            Places: L.tileLayer.wms('http://ows.mundialis.de/services/service?', {
                layers: 'OSM-Overlay-WMS'
            }),

            Dark: L.tileLayer.wms('http://ows.mundialis.de/services/service?', {
                layers: 'Dark'
            }),

            'Topography, then places': L.tileLayer.wms('http://ows.mundialis.de/services/service?', {
                layers: 'TOPO-WMS,OSM-Overlay-WMS'
            }),
            };

        L.control.layers(basemaps).addTo(map);

        basemaps.Topography.addTo(map);

  basemaps.Topography.addTo(map);
        // get color depending on population density value
       function getColor(d) {
            return d > 1000 ? '#7FFFD4' :
                d > 500 ? '	#8A2BE2' :
                d > 200 ? '#DEB887' :
                d > 100 ? '	#7FFF00' :
                d > 50 ? '##6495ED' :
                d > 20 ? '#DC143C' :
                d > 10 ? '#FED976' :
                '#FFEDA0';
        }

        function style(feature) {
            return {
                weight: 2,
                opacity: 1,
                color: 'white',
                dashArray: '3',
                fillOpacity: 0.7,
                fillColor: getColor(feature.properties.density)
            };
        }

        function highlightFeature(e) {
            var layer = e.target;

            layer.setStyle({
                weight: 5,
                color: '#666',
                dashArray: '',
                fillOpacity: 0.7
            });

            if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
                layer.bringToFront();
            }

            info.update(layer.feature.properties);
        }

        var geojson;

        function resetHighlight(e) {
            geojson.resetStyle(e.target);
            info.update();
        }

        function zoomToFeature(e) {
            map.fitBounds(e.target.getBounds());
        }

        function onEachFeature(feature, layer) {
            layer.on({
                mouseover: highlightFeature,
                mouseout: resetHighlight,
                click: onMapClick
            });
        }

        geojson = L.geoJson(statesData, {
            style: style,
            onEachFeature: onEachFeature
        }).addTo(map);

        map.attributionControl.addAttribution('Population data &copy; <a href="http://census.gov/">US Census Bureau</a>');

        //legenda
        var legend = L.control({
            position: 'topright'
        });

        legend.onAdd = function(map) {

            var div = L.DomUtil.create('div', 'info legend'),
                grades = [0, 10, 20, 50, 100, 200, 500, 1000],
                labels = [],
                from, to;

            for (var i = 0; i < grades.length; i++) {
                from = grades[i];
                to = grades[i + 1];

                labels.push(
                    '<i style="background:' + getColor(from + 1) + '"></i> ' +
                    from + (to ? '&ndash;' + to : '+'));
            }

            div.innerHTML = labels.join('<br>');
            return div;
        };

        legend.addTo(map);

        var popup = L.popup();

        // buat fungsi popup saat map diklik
        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("koordinatnya adalah " + e.latlng
                    .toString()
                ) //set isi konten yang ingin ditampilkan, kali ini kita akan menampilkan latitude dan longitude
                .openOn(map);

            document.getElementById('latlong').value = e.latlng //value pada form latitde, longitude akan berganti secara otomatis
        }
        map.on('click', onMapClick); //jalankan fungsi
		

        <?php

        $mysqli = mysqli_connect('localhost', 'root', '', 'latihan');   //koneksi ke database
        $tampil = mysqli_query($mysqli, "select * from lokasi"); //ambil data dari tabel lokasi
        while ($hasil = mysqli_fetch_array($tampil)) { ?> //melooping data menggunakan while

            //menggunakan fungsi L.marker(lat, long) untuk menampilkan latitude dan longitude
            //menggunakan fungsi str_replace() untuk menghilankan karakter yang tidak dibutuhkan
            L.marker([<?php echo str_replace(['[', ']', 'LatLng', '(', ')'], '', $hasil['lat_long']); ?>]).addTo(map)

                //data ditampilkan di dalam bindPopup( data ) dan dapat dikustomisasi dengan html
                .bindPopup(`<?php echo 'Nama tempat : ' . $hasil['nama_tempat'] . ' | Kategori : ' . $hasil['kategori'] . ' | Keteragan : ' . $hasil['keterangan']; ?>`)

        <?php } ?>
    </script>
</body>

</html>