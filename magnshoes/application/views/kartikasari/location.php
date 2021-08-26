
<!-- GOOGLE MAPS -->
<!--<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA7NtUocoWoPlX7Gf7BL3c4DlTjRt5XK7Y&sensor=true">
</script> -->

<script type="text/javascript">
  $(document).ready(function(){
    $('#map').jMapping();
    $(".map-location").click(function(){
      $(".map-location ul").removeClass("active");
      $(this).children().find("ul").addClass("active");
    });
  });

</script>
<?php $b = $this->config->item("base_url") . "/"; ?>
<div class="contentmain">
  <h1>Kartikasari on Google Maps</h1><hr/>
  <div id="map-side-bar" >
    <div id="block_address1" class="block_outlet map-location" data-jmapping="{id: 1, point: {lat:
-6.940051,  lng: 107.624991}, category: 'Shop'}">
      <ul>
        <li class="outlet_name"> <a href="#" class="map-link"> Kartika Sari Buah Batu </a></li>
        <li class="outlet_address">Jl. Buah Batu no. 165 A Bandung</li>
        <li class="outlet_telp">Tlp. +6222 7319385 </li>
      </ul>
      <div class="info-box">
        <ul>
          <li class="outlet_name"> <a href="#" class="map-link"> Kartika Sari Buah Batu </a></li>
        <li class="outlet_address">Jl. Buah Batu no. 165 A Bandung</li>
        <li class="outlet_telp">Tlp. +6222 7319385 </li>
        </ul>
      </div>
    </div>
    <div id="block_address1" class="block_outlet map-location" data-jmapping="{id: 2, point: {lat:
-6.912056, lng: 107.600168}, category: 'Shop'}">
      <ul>
        <li class="outlet_name"> <a href="#" class="map-link"> Kartika Sari Kebun Kawung </a> </li>
        <li class="outlet_address">Jl. H. akbar no. 4 Bandung </li>
        <li class="outlet_telp">+6222 4231355 - +6222 4200441 </li>
      </ul>
      <div class="info-box">
        <ul>
           <li class="outlet_name"> <a href="#" class="map-link"> Kartika Sari Kebun Kawung </a> </li>
        <li class="outlet_address">Jl. H. akbar no. 4 Bandung </li>
        <li class="outlet_telp">+6222 4231355 - 4200441 </li>
        </ul>
      </div>
    </div>
    <div id="block_address1" class="block_outlet map-location" data-jmapping="{id: 3, point: {lat:-6.897564, lng: 107.612656}, category: 'Shop'}">
      <ul>
        <li class="outlet_name"> <a href="#" class="map-link"> Kartikasari Dago  </a></li>
        <li class="outlet_address">Jl. Ir. H. Djuanda no. 85 Bandung</li>
        <li class="outlet_telp">+62 227735262 / +6222 2509500 </li>
      </ul>
      <div class="info-box">
        <ul>
          <li class="outlet_name"> <a href="#" class="map-link"> Kartikasari Dago  </a></li>
          <li class="outlet_address">Jl. Ir. H. Djuanda no. 85 Bandung</li>
          <li class="outlet_telp">+62 227735262 / +6222 2509500 </li>
        </ul>
      </div>
    </div>
    <div id="block_address1" class="block_outlet map-location" data-jmapping="{id: 4, point: {lat: -6.912562, lng: 107.650139}, category: 'Shop'}">
      <ul>
        <li class="outlet_name"> <a href="#" class="map-link"> Kartika Sari Terusan Jakarta </a> </li>
        <li class="outlet_address">Jl. Terusan Jakarta no. 77E Bandung</li>
        <li class="outlet_telp">+6222 7101280 </li>
      </ul>
      <div class="info-box">
        <ul>
          <li class="outlet_name"> <a href="#" class="map-link"> Kartika Sari Terusan Jakarta </a> </li>
          <li class="outlet_address">Jl. Terusan Jakarta no. 77E Bandung</li>
          <li class="outlet_telp">+6222 7101280 </li>
        </ul>
      </div>
    </div>
    <div id="block_address1" class="block_outlet map-location" data-jmapping="{id: 5, point: {lat: -6.914458, lng: 107.605629}, category: 'Shop'}">
      <ul>
        <li class="outlet_name"> <a href="#" class="map-link"> Kartika Sari Kebun Jukut </a> </li>
        <li class="outlet_address">Jl. Kebon Jukut no. 3C Bandung</li>
        <li class="outlet_telp">+6222 4230397 </li>
      </ul>
      <div class="info-box">
        <ul>
          <li class="outlet_name"> <a href="#" class="map-link"> Kartika Sari Kebun Jukut </a> </li>
          <li class="outlet_address">Jl. Kebon Jukut no. 3C Bandung</li>
          <li class="outlet_telp">+6222 4230397 </li>
        </ul>
      </div>
    </div>
    <div id="block_address1" class="block_outlet map-location" data-jmapping="{id: 6, point: {lat: -6.969404, lng: 107.574501}, category: 'Shop'}">
      <ul class="active">
        <li class="outlet_name"> <a href="#" class="map-link"> Kartika Sari Kopo</a> </li>
        <li class="outlet_address">Jl. Kopo Sayati no. 111 A Bandung</li>
        <li class="outlet_telp">+6222 5414340 </li>
      </ul>
      <div class="info-box">
        <ul>
          <li class="outlet_name"> <a href="#" class="map-link"> Kartika Sari Kopo</a> </li>
          <li class="outlet_address">Jl. Kopo Sayati no. 111 A Bandung</li>
          <li class="outlet_telp">+6222 5414340 </li>
        </ul>
      </div>
    </div>
  </div>
  <div id="map" style="width: 850px; height: 500px; margin: 0px;"></div>


</div>
