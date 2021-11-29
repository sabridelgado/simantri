    <section class="ftco-section bg-light">
      <div class="container">
        <style>
          #map-canvas {
            width: 100%;
            height: 500px;
            border: solid;

          }
        </style>
        <!-- <script src="https://maps.googleapis.com/maps/api/js"></script> -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8aB4MpC1orBp300KQQAiVEnWdpry4OPg"></script>
        <script>
         
        var markers = [
        <?php foreach ($proper as $key) { 
            if($key->proper_status==0){
              $status = '<span class="badge badge-warning">Dalam Proses</span>';
            }elseif($key->proper_status==1){
              $status = '<span class="badge badge-danger">Tidak Taat</span>';
            }else{
              $status = '<span class="badge badge-success">Taat</span>';
            }
        ?>
          ['<?php echo "<b>Nama Kegitan/Usaha :</b> <br>".$key->proper_nama_kegiatan."<br> <br><b>Alamat Kegiatan :</b> <br>".$key->proper_alamat."<br><br> <b>Nama Pemrakarsa :</b> <br>".$key->proper_nama_pemrakarsa." <br><br> <b>Status :</b><br> ".$status ;?>', <?php echo $key->proper_titik_kordinat?>],
        
        <?php } ?>
        ];
        
        function initialize() {
            var mapCanvas = document.getElementById('map-canvas');
            var mapOptions = {
              mapTypeId: google.maps.MapTypeId.ROADMAP
            }     
            var map = new google.maps.Map(mapCanvas, mapOptions)
     
        var infowindow = new google.maps.InfoWindow(), marker, i;
        var bounds = new google.maps.LatLngBounds(); // diluar looping
        for (i = 0; i < markers.length; i++) {  
        pos = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(pos); // di dalam looping
        marker = new google.maps.Marker({
            position: pos,
            map: map
        });
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infowindow.setContent(markers[i][0]);
                infowindow.open(map, marker);
            }
        })(marker, i));
        map.fitBounds(bounds); // setelah looping
        }
     
          }
     
     
          google.maps.event.addDomListener(window, 'load', initialize);
        </script>

        <div id="map-canvas"></div>
        
        
      </div>
    </section>