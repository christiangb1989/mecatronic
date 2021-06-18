<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-9">
                <div class="card">
                    <div class="card-body">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card border-0">
                    <div class="card-header bg-dark">
                        <h3 class="text-danger text-center">{{ $data->placa }}</h3>

                    </div>
                    <div class="w-100 bg-danger p-0">
                        <p class="text-center text-light p-0 m-0">Motor {{ $gps->motor != 0?'Encendido':'Apagado' }}</p>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Datos</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Historico</a>
                            </li>

                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <svg height="100%" version="1.1" width="100%" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative; top: -0.234375px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Rapha�l 2.1.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><filter id="speedo-inner-shadow"><feOffset dx="0" dy="3"></feOffset><feGaussianBlur result="offset-blur" stdDeviation="5"></feGaussianBlur><feComposite operator="out" in="SourceGraphic" in2="offset-blur" result="inverse"></feComposite><feFlood flood-color="black" flood-opacity="0.3" result="color"></feFlood><feComposite operator="in" in="color" in2="inverse" result="shadow"></feComposite><feComposite operator="over" in="shadow" in2="SourceGraphic"></feComposite></filter></defs><path fill="#ffffff" stroke="none" d="M105.25,112L79,112A70,70,0,0,1,219,112L192.75,112A43.75,43.75,0,0,0,105.25,112Z" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" filter="url(#speedo-inner-shadow)"></path><path fill="#fa9401" stroke="none" d="M105.25,112L79,112A70,70,0,0,1,176.6320699468987,47.684615289577124L166.2700437168117,71.8028845559857A43.75,43.75,0,0,0,105.25,112Z" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" filter="url(#speedo-inner-shadow)"></path><text x="149" y="21.53846153846154" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#999999" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font: bold 14px Arial; fill-opacity: 1;" font-size="14px" font-weight="bold" font-family="Arial" fill-opacity="1"><tspan dy="21.53846153846154" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></tspan></text><text x="149" y="100" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#333366" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font: bold 29px Arial; fill-opacity: 1;" font-size="29px" font-weight="bold" font-family="Arial" fill-opacity="1"><tspan dy="10" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0.0</tspan></text><text x="149" y="116.9375" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#333366" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font: 12px Arial; fill-opacity: 1;" font-size="12px" font-weight="normal" font-family="Arial" fill-opacity="1"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">KPH</tspan></text><text x="92.125" y="124.24999999999997" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#333366" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font: 10px Arial; fill-opacity: 0;" font-size="10px" font-weight="normal" font-family="Arial" fill-opacity="0"><tspan dy="3.4999999999999716" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text><text x="205.875" y="124.24999999999997" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#333366" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font: 10px Arial; fill-opacity: 0;" font-size="10px" font-weight="normal" font-family="Arial" fill-opacity="0"><tspan dy="3.4999999999999716" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">120</tspan></text></svg>
                            </div>
                            <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script>
        $(function () {
            $('#myTab li:first-child a').tab('show')
        })
        let map;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: -12.04318, lng: -77.02824 },
                zoom: 13,
            });



            // The marker, positioned at Uluru
            const marker = new google.maps.Marker({
                position: { lat: -12.04318, lng: -77.02824 },
                map: map,
                icon: '/images/icono_map.png',
            });



            const contentString =
                '<div id="content">' +
                '<div id="siteNotice">' +
                "</div>" +
                '<h4 id="firstHeading" class="firstHeading">F5U182</h4>' +
                '<div id="bodyContent">' +
                "<p style='margin: 0px'><b>Fecha:</b>14-06-2021 </p>" +
                "<p style='margin: 0px'><b>GPS:</b>-0.000, -0.000 </p>" +
                "<p style='margin: 0px'><b>Dirección:</b>, </p>" +
                "<p style='margin: 0px'><b>Nivel Combustible:</b> 0% </p>" +
                "<p style='margin: 0px'><b>Conductor:</b> </p>" +
                "<p style='margin: 0px'><b>Odómetro:</b>50314 KM </p>" +
                "<p style='margin: 0px'><b>Horas de motor:</b>, </p>" +
                "<p style='margin: 0px'><b>Voltaje Bateria:</b>, </p>" +
                "</div>" +
                "</div>";

            const infowindow = new google.maps.InfoWindow({
                content: contentString,
            });
            marker.addListener("click", () => {
                infowindow.open(map, marker);
            });
        }

    </script>
</x-app-layout>
