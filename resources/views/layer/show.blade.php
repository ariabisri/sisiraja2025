@extends('layout.app')
@section('style')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-draw/dist/leaflet.draw.css" />
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Peta</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Map</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            
                <div class="row">
                    {{-- col right --}}
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                          <div class="card-header" style="width: 100%">
                            <h3 class="card-title">Peta</h3>
                          </div>
                          <div class="card-body" id="map" style="width: 100%; height: 450px">
                            {{-- <div id="map" style="height: 400px; margin-bottom: 15px; z-index: 0 !important;"></div> --}}
                          </div>
                          
                        </div>
                      </div>
                      {{-- / col right --}}
                    
                </div>
                <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
  </div>



@endsection
@section ('script')
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-draw/dist/leaflet.draw.js"></script>

<script>
   const map = L.map('map').setView([-6.737349, 107.004481], 8);

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    var data = {!! $data !!}
    if (data.geojson_path){

        json = fetch('/storage/'+data.geojson_path)
        
        .then(response => response.text()) // Ambil sebagai teks
        .then(text => {
            let jsonData = JSON.parse(text); // Ubah teks menjadi JSON
            console.log(jsonData);
            L.geoJSON(jsonData).addTo(map);
        })
        .catch(error => console.error("Error fetching JSON:", error));
    }
    features = data.features;
    var markericon = L.icon({
    iconUrl: '/storage/'+features[1].icon,
    iconSize:     [38, 38], // size of the icon
    
    });

    features.forEach(feature => {
      latlangsplit = feature.latlng.split(',').map(Number);
    console.log (latlangsplit);
     L.marker(latlangsplit, {icon: markericon}).bindPopup(feature.deskripsi).addTo(map);
    });

    

   
    


  

</script>



@endsection
