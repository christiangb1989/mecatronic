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
                                <p class="text-center" style="margin: 0px"><small>Último Evento</small></p>
                                <p id="last-event"></p>
                                <div id="gauge"></div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <img src="/images/batt100.png" width="70" alt="" srcset="">
                                    </div>
                                    <div>
                                        <img src="/images/fuel_0.png"width="50" alt="" srcset="">
                                    </div>
                                </div>
                                <div class="border-r"></div>
                            </div>
                            <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p class="m-0 text-sm">Avenida Rivera del Mar, Departamento de Piura 20841, Perú</p>
                                                <label class="btn btn-sm btn-primary">Reposo</label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Raphael must be included before justgage -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.4/raphael-min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/justgage/1.2.9/justgage.min.js"></script>
    <script src="/js/moment.min.js"></script>

    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script>
        var gauge = new JustGage({
            id: "gauge", // the id of the html element
            value: 50,
            min: 0,
            max: 220,
            decimals: 2,
            gaugeWidthScale: 0.6,
            label: 'km',
            labelMinFontSize:'12',
            valueMinFontSize:'29'
        });

        // update the value randomly
        setInterval(() => {
            gauge.refresh(Math.random() * 100);
        }, 5000)

        $(function () {
            $('#myTab li:first-child a').tab('show')
        })
        let map;

        function calcule(inputDate) {
            var date = new Date(inputDate);
            return moment(date.getTime()).format("DD-MM-YYYY h:mm:ss");
        }


        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: -12.04318, lng: -77.02824 },
                zoom: 13,
            });
            var lastEvent = document.getElementById('last-event');

            setInterval(function (){
                $.ajax({
                    url: "/position/{{ $data->imei }}",
                }).done(function( response ) {

                    lastEvent.innerHTML = calcule(response.created_at)
                    console.log( "Data Saved: " + response.lat );
                    const marker = new google.maps.Marker({
                        position: { lat: response.lat, lng:response.long },
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
                });



            },5000)
            // The marker, positioned at Uluru
        }

    </script>
</x-app-layout>
