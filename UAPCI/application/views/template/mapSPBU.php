<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemetaan SPBU Bandar Lampung</title>

    <!-- Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>
    <link rel="stylesheet" href = "<?= base_url('assets/')?>js/leaflet-panel-layers-master/src/leaflet-panel-layers.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
    <script src = "<?= base_url('assets/')?>js/leaflet-panel-layers-master/src/leaflet-panel-layers.js"></script>
    <script src = "<?= base_url('assets/')?>js/leaflet.ajax.js"></script>

	<!-- Load jQuery and PapaParse to read data from a CSV file -->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/papaparse@5.3.0/papaparse.min.js"></script>

	<style>
		#map {
			width: 1200px;
			height: 650px;
		}
		.info { padding: 6px 8px; font: 14px/16px Arial, Helvetica, sans-serif; background: white; background: rgba(255,255,255,0.8); box-shadow: 0 0 15px rgba(0,0,0,0.2); border-radius: 5px; } 
		.info h4 { margin: 0 0 5px; color: #777; }
		.legend {
			padding: 6px 8px;
			font: 14px Arial, Helvetica, sans-serif;
			background: white;
			background: rgba(255, 255, 255, 0.8);
			box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
			border-radius: 5px;
			line-height: 30px;
			color: #555;
		}
			/* .legend h4 {
				text-align: center;
				font-size: 16px;
				margin: 2px 12px 8px;
				color: #777;
			} */

			/* .legend span {
				position: relative;
				bottom: 3px;
			} */

		.legend i {
			width: 25px;
			height: 25px;
			float: left;
			margin: 0 8px 0 0;
			opacity: 0.7;
		}

		.legend i.icon {
			background-size: 25px;
			background-color: rgba(255, 255, 255, 1);
		}
	
	</style>
</head>
<body>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                        <div class ="mt-3"id='map'></div>
                </div>
            </div>
        </div>
    </section>
</div>


	<script type="text/javascript" src = "<?= base_url('assets/')?>geojson/ADMINISTRASIKECAMATAN_AR_50K.js"></script>
	<script type="text/javascript" src = "<?= base_url('assets/')?>geojson/JalanNasional.js"></script>
	<script type="text/javascript" src = "<?= base_url('assets/')?>geojson/JalanProvinsi.js"></script>
	<script type="text/javascript" src = "<?= base_url('assets/')?>geojson/JalanKabupaten.js"></script>
	<script type="text/javascript" src = "<?= base_url('assets/')?>geojson/Kabupaten Bandar Lampung.js"></script>

    <div class="container-fluid">
        <script>
            //fungsi-fungsi
            // membuat icon SPBU
            var iconGasStation = L.icon({
                    iconUrl: '<?= base_url('assets/')?>/icon/pinGasStation.png',
                    iconSize:     [40, 40], // ukuran icon
                    popupAnchor:  [0, -20] // titik buka popup dari titik marker
                });
                    var iconPertamina = L.icon({
                    iconUrl: '<?= base_url('assets/')?>/icon/pinPertamina.png',
                    iconSize:     [40, 40], 
                    popupAnchor:  [0, -20] 
                });
                    var iconAKR = L.icon({
                    iconUrl: '<?= base_url('assets/')?>/icon/pinAKR.png',
                    iconSize:     [40, 40],
                    popupAnchor:  [-3, -76] 
                });

            //fungsi Popup
            function popUp(f,l){
                var out = [];
                if (f.properties){
                    for(key in f.properties){
                        out.push(key+": "+f.properties[key]);
                    }
                    l.bindPopup(out.join("<br />"));
                }
                }   

            //fungsi pewarna sesuai id kecamatan
            function getColorKecamatan(KodeWil){
                return 	KodeWil == 1 ? '#ff0000' :
                        KodeWil == 2 ? '#ff4000' :
                        KodeWil == 3 ? '#ff8000' :
                        KodeWil == 4 ? '#ffbf00' :
                        KodeWil == 5 ? '#34113F' :
                        KodeWil == 6 ? '#ffff00' :
                        KodeWil == 7 ? '#6610f2' :
                        KodeWil == 8 ? '#bfff00' :
                        KodeWil == 9 ? '#80ff00' :
                        KodeWil == 10 ? '#40ff00' :
                        KodeWil == 11 ? '#EE4266' :
                        KodeWil == 12 ? '#00ff00' :
                        KodeWil == 13 ? '#00ffff' :
                        KodeWil == 14 ? '#0040ff' :
                        KodeWil == 15 ? '#bf00ff' :
                        KodeWil == 16 ? '#ff00bf' :
                        KodeWil == 17 ? '#45147e' :
                        KodeWil == 18 ? '#DD0426' :
                        KodeWil == 19 ? '#FEB24C' :
                        KodeWil == 20 ? '#FED976' :
                        KodeWil == 21 ? '#FED976' :
                                        'black';
            }
            //fungsi style kecamatan
            function styleKecamatan(feature){
                return {
                    fillColor : getColorKecamatan(feature.properties.KodeWil), 
                    weight: 3,
                    opacity: 1,
                    color: 'black',
                    dashArray: '6',
                    fillOpacity: 0.5
                }
            }
            //fungsi style kabupaten
            function styleKabupaten(feature){
                return {
                    fillColor : 'white', 
                    weight: 3,
                    opacity: 1,
                    color: 'black',
                    dashArray: '6',
                    fillOpacity: 0
                }
            }
            //fungsi style jalan nasional
            function styleJalanNasional(feature){
                return {
                    weight: 3,
                    opacity: 1,
                    color: '#EBDA28',
                    fillOpacity: 1
                }
            }
            //fungsi style jalan provinsi
            function styleJalanProvinsi(feature){
                return {
                    weight: 3,
                    opacity: 1,
                    color: '#ff8c00',
                    fillOpacity: 1
                }
            }
            //fungsi style jalan kabupaten
            function styleJalanKabupaten(feature){
                return {
                    weight: 3,
                    opacity: 1,
                    color: '#7A7215',
                    fillOpacity: 1
                }
            }
            //fungsi hover
            function highlightFeature(e) {
                var layer = e.target;

                layer.setStyle({
                    fillColor : 'navy',
                    weight: 7,
                    color: '#666',
                    dashArray: '',
                    fillOpacity: 1
                });

                if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
                    layer.bringToFront();
                }

                info.update(layer.feature.properties);
            }
            //fungsi un-hover
            function resetHighlight(e) {
                geojsonPoly2.resetStyle(e.target);
                info.update();
            }
            //fungsi gabungan hover dan un-hover
            function onEachFeature(feature, layer) {
                layer.on({
                    mouseover: highlightFeature,
                    mouseout: resetHighlight,
                });
            }

            //deklarasi Feature
            var geojsonPoly;
            var geojsonPoly2;
            var geojsonLineNasional;
            var geojsonLineProvinsi;
            var geojsonLineKecamatan;

            //deklarasi Layer di Map
            var Markers = L.layerGroup();
            var GasStations = L.layerGroup();
            var Kecamatan = L.layerGroup();
            var Kabupaten = L.layerGroup();
            var JalanNasional = L.layerGroup();
            var JalanProvinsi = L.layerGroup();
            var JalanKabupaten = L.layerGroup();

            //Marker dari database ke layer
            <?php foreach($data as $a):?>
                var DatabaseMarker = L.marker([<?= $a['coord'];?>]).addTo(Markers);
                DatabaseMarker.bindPopup("<?= $a['nama'];?>");
            <?php endforeach;?>

            //csv dan marker ke layer
                // Read markers data from data.csv
                $.get('<?= base_url('assets/')?>CSV/SPBU.csv', function(csvString) {

                // Use PapaParse to convert string to array of objects
                var data = Papa.parse(csvString, {header: true, dynamicTyping: true}).data;

                // For each row in data, create a marker and add it to the map
                // For each row, columns `Latitude`, `Longitude`, and `Title` are required
                for (var i in data) {
                var row = data[i];

                //Menambah marker dari csv layer GasStations
                var marker = L.marker([row.Latitude, row.Longitude], {
                    icon: iconPertamina}).bindPopup('No SPBU '+row.Title);
                marker.addTo(GasStations);
                }
                });
            
            //marker spbu AKR ke layer GasStations
            var marker = L.marker([-5.364103834598487, 105.27592121917267], {
            icon : iconAKR}).addTo(GasStations);
            marker.bindPopup("SPBU AKR").openPopup();

            //deklarasi feature polygon dan line

            //membuat polygon Kabupaten
            geojsonPoly = L.geoJson(PolyKabupaten, {
                style: styleKabupaten,
            }).addTo(Kabupaten);

            //membuat polygon Kecamatan
            geojsonPoly2 = L.geoJson(PolyKecamatan, {
                style: styleKecamatan,
                onEachFeature: onEachFeature
            }).addTo(Kecamatan);

            //membuat polygon Line Nasional
            geojsonLineNasional = L.geoJson(LineNasional, {
                style: styleJalanNasional,
                onEachFeature: function (feature, layer) {
                layer.bindPopup('<h5>' + 'Jalan'+ ' ' +feature.properties.NAMA+'</h5>');
                }
            }).addTo(JalanNasional);
            //membuat polygon Line Provinsi
            geojsonLineProvinsi = L.geoJson(LineProvinsi, {
                style: styleJalanProvinsi,
                onEachFeature: function (feature, layer) {
                layer.bindPopup('<h5>' + 'Jalan'+ ' ' +feature.properties.NAMA+'</h5>');
                }
            }).addTo(JalanProvinsi);
            //membuat polygon Line Kabupaten
            geojsonLineKecamatan = L.geoJson(LineKabupaten, {
                style: styleJalanKabupaten,
                onEachFeature: function (feature, layer) {
                layer.bindPopup('<h5>' + 'Jalan'+ ' ' +feature.properties.NAMA+'</h5>');
                }
            }).addTo(JalanKabupaten);

            

            //membuat layer peta
            var mbAttr 	= 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                mbUrl 	= 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';

            var grayscale   = L.tileLayer(mbUrl, {id: 'mapbox/light-v9', tileSize: 512, zoomOffset: -1, attribution: mbAttr}),
                colorful  	= L.tileLayer(mbUrl, {id: 'mapbox/streets-v11', tileSize: 512, zoomOffset: -1, attribution: mbAttr});

            //deklarasi map dan layer
            var map = L.map('map', {
                center: [-5.403131, 105.266419],
                zoom: 12,
                tap: false,
                layers: [colorful, GasStations, Markers, Kabupaten]
            });

            var baseLayers = [
                {
                    name: "Grayscale",
                    layer: grayscale
                },
                {
                    name: "Colorful",
                    layer: colorful
                }
            ];

            var overlays = [
                {
                    name: "Markers",
                    // icon: iconByName('bar'),
                    layer:Markers
                },
                {
                    name: "SPBU",
                    // icon: iconByName('bar'),
                    layer:GasStations
                },
                {
                    name: "Kabupaten",
                    // icon: iconByName('parking'),
                    layer: Kabupaten
                },
                {
                    name: "Kecamatan",
                    // icon: iconByName('parking'),
                    layer: Kecamatan
                },
                {
                    name: "Jalan Nasional",
                    // icon: iconByName('parking'),
                    layer: JalanNasional
                },
                {
                    name: "Jalan Provinsi",
                    // icon: iconByName('parking'),
                    layer: JalanProvinsi
                },
                {
                    name: "Jalan Kabupaten",
                    // icon: url(assets/icon/pinPertamina.png),
                    layer: JalanKabupaten
                }
            ];

            var info = L.control();
            info.onAdd = function (map) {
                this._div = L.DomUtil.create('div', 'info'); // create a div with a class "info"
                this.update();
                return this._div;
            };
            // method that we will use to update the control based on feature properties passed
            info.update = function (props) {
                this._div.innerHTML = '<h4>Bandar Lampung</h4>' +  
                (props ? 'Kecamatan '+ props.Kecamatan + '<br>' + 'Suhu '+props.Suhu + ' derajat celcius'
                + '<br>' + 'Total SPBU '+props.SUMSPBU:
                'Hover di kecamatan');
            };
            info.addTo(map);

            var panelLayers = new L.Control.PanelLayers(baseLayers, overlays, {
                position: 'topright',
                compact: true
            });
            map.addControl(panelLayers);

            L.control.scale({maxWidth: 150}).addTo(map);

            //legend
            var legend = L.control({ position: "bottomright" });

            legend.onAdd = function(map) {
                var div = L.DomUtil.create("div", "legend");
                    div.innerHTML += "<h4>Legend</h4>";
                    // div.innerHTML += '<i style="background: #477AC2"></i><span>Water</span><br>';
                    div.innerHTML += '<i class="icon" style="background-image: url(<?= base_url('assets/')?>icon/dashed.png);background-repeat: no-repeat;"></i><span>Batas Wilayah</span><br>';
                    div.innerHTML += '<i class="icon" style="background-image: url(<?= base_url('assets/')?>icon/JalanNasional.png);background-repeat: no-repeat;"></i><span>Jalan Nasional</span><br>';
                    div.innerHTML += '<i class="icon" style="background-image: url(<?= base_url('assets/')?>icon/JalanProvinsi.png);background-repeat: no-repeat;"></i><span>Jalan Provinsi</span><br>';
                    div.innerHTML += '<i class="icon" style="background-image: url(<?= base_url('assets/')?>icon/JalanKabupaten.png);background-repeat: no-repeat;"></i><span>Jalan Kabupaten</span><br>';
                    div.innerHTML += '<i class="icon" style="background-image: url(<?= base_url('assets/')?>icon/pinAKR.png);background-repeat: no-repeat;"></i><span>SPBU AKR</span><br>';
                    div.innerHTML += '<i class="icon" style="background-image: url(<?= base_url('assets/')?>icon/pinPertamina.png);background-repeat: no-repeat;"></i><span>SPBU Pertamina</span><br>';
                    return div;
            };

            legend.addTo(map);

        </script>
    </div>

