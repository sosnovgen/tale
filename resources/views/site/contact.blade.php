@extends('site.main')
@section('content')

    <div class="container" style="margin-top: 50px;">
        <div class="row">

            <div id="map-container" class="col-md-6"></div>

            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js"></script>
            <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
            <script>

                function init_map() {
                    var var_location = new google.maps.LatLng(55.754015, 37.618522);

                    var var_mapoptions = {
                        center: var_location,
                        zoom: 14
                    };

                    var var_marker = new google.maps.Marker({
                        position: var_location,
                        map: var_map,
                        title:"Venice"});

                    var var_map = new google.maps.Map(document.getElementById("map-container"),
                            var_mapoptions);

                    var_marker.setMap(var_map);

                }

                google.maps.event.addDomListener(window, 'load', init_map);

            </script>

            <div class="col-md-3">
                <div class="span4">
                    <h2>Snail mail</h2>
                    <address>
                        <strong>Hythe Window Cleaning</strong><br>
                        15 Springfield Way<br>
                        Hythe<br>
                        Kent<br>
                        United Kingdon<br>
                        CT21 5SH<br>
                        <abbr title="Phone">P:</abbr> 01234 567 890
                    </address>
                </div>
            </div>
            <div class="col-md-3">

            </div>

        </div>
    </div>

@stop