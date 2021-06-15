<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div id="map"></div>
                    <img src="" alt="">
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script>
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
