@extends('layouts.essential')
@section('styles')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>
    <style>
        #map{
            width: 1000px;
            height: 700px;
            border: solid 1px black;
        }
    </style>
@endsection
@section('content')
    <div class="container mt-5">
        <h2>Heatmap</h2>
        <div id="map"></div>
    </div>
@endsection
@section('scripts')
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
  integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
  crossorigin=""></script>
<script type="text/javascript" src="/heatmap.min.js"></script>
<script type="text/javascript" src="/leaflet-heatmap.js"></script>
<script>
        let savedData;
        const mapData = fetch("http://127.0.0.1:8000/api/heatMapData")
            .then((response) => response.json())
            .then((data) => {
                return data;
            });

        const displayMap = () => {
            mapData.then((a) => {
                var testData = {
                max: 100,
                data: a,
                };

                var baseLayer = L.tileLayer(
                'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
                    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
                    maxZoom: 18
                }
                );

                var cfg = {
                // radius should be small ONLY if scaleRadius is true (or small radius is intended)
                "radius": 0.4,
                "maxOpacity": .8, 
                // scales the radius based on map zoom
                "scaleRadius": true, 
                // if set to false the heatmap uses the global maximum for colorization
                // if activated: uses the data maximum within the current map boundaries 
                //   (there will always be a red spot with useLocalExtremas true)
                "useLocalExtrema": true,
                // which field name in your data represents the latitude - default "lat"
                latField: 'lat',
                // which field name in your data represents the longitude - default "lng"
                lngField: 'lng',
                // which field name in your data represents the data value - default "value"
                valueField: 'count'
                };


                var heatmapLayer = new HeatmapOverlay(cfg);

                var map = new L.Map('map', {
                center: new L.LatLng(17, 121),
                zoom: 4,
                layers: [baseLayer, heatmapLayer]
                });

                heatmapLayer.setData(testData);

                // make accessible for debugging
                layer = heatmapLayer;
            });
        };

        window.onload = displayMap();
    </script>
@endsection