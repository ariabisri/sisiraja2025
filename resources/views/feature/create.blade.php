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
            <form action="{{ route('feature.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- @method('POST') --}}
                <div class="row">
                    <input type="hidden" name='layer_id' value="9">
                    <input type="hidden" name='judul' value="judul_feature">
                    <input type="hidden" id='latlng' name='latlng'>
                    <!-- left column -->
                    <div class="col-md-3">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title">Feature</h3>
                              <div class="card-tools">
                                <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                                </button>
                              </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Judul</label>
                                <input type="text" class="form-control" id="judul" name="nama" value="" placeholder="Judul Feature">
                                @error('email')
                                    <small>{{ $message }}</small>
                                @enderror
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputUsername1">Deskripsi</label>
                                  <textarea class="form-control" id="deskripsi" name="deskripsi" value="" placeholder="Isi deskripsi"></textarea>
                                  @error('username')
                                    <small>{{ $message }}</small>
                                @enderror
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputUsername1">Icon</label>
                                  <input type="file" name="icon" accept="image/*">
                                  @error('username')
                                    <small>{{ $message }}</small>
                                @enderror
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputUsername1">JSON</label>
                                  <textarea class="form-control" id="json" name="json" value="" placeholder="Isi deskripsi"></textarea>
                                  @error('username')
                                    <small>{{ $message }}</small>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Latitude</label>
                                <input type="text" class="form-control" id="fr_latitude" name="latitude" value="" placeholder="Latitude">
                                @error('text')
                                    <small>{{ $message }}</small>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Longitude</label>
                                <input type="text" class="form-control" id="fr_longitude" name="longitude" value="" placeholder="Longitude">
                                @error('email')
                                    <small>{{ $message }}</small>
                                @enderror
                              </div>
                              <div class="form-group"><button type="submit" class="btn btn-primary">Submit</button></div>
                            </div>
                            <!-- /.card-body -->
                          </div>
                          <!-- /.card -->
                        </div>
                      </div>
                    </div>
                    <!--/.col (left) -->
                    {{-- col right --}}
                    <div class="col-md-9">
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
            </form>
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

    var drawnItems = new L.FeatureGroup();
    map.addLayer(drawnItems);

    // Initialize the draw control and pass it the FeatureGroup of editable layers
    var drawControl = new L.Control.Draw({
        draw: {
                polygon: false,
                rectangle: false,
                polyline: false,
                circle: false,
                marker: true,
                circlemarker: false
            },
        edit: {
            featureGroup: drawnItems
        }
    });
    map.addControl(drawControl);

    map.on('draw:created', function (e) {
    var type = e.layerType,
        layer = e.layer;

    if (type === 'marker') {
        // Do marker specific actions
    }

    // Do whatever else you need to. (save to db, add to map etc)
    drawnItems.addLayer(layer);
    });

    map.on('draw:edited', function () {
        // Update db to save latest changes.
    });

    map.on('draw:deleted', function () {
        // Update db to save latest changes.
    });
    var marker;
    const popup = L.popup();
    var json;
    var judul;
    var deskripsi;
    function onMapClick(e) {
		// popup
		// 	.setLatLng(e.latlng)
		// 	.setContent( `${e.latlng.toString()}`)
		// 	.openOn(map);
            if(!marker){

               marker= L.marker(e.latlng).addTo(drawnItems);
               json= `"type": "Feature","properties": {},"geometry": {
                            "coordinates": [`+e.latlng.lat+`,`+e.latlng.lng+`],"type": "Point"}`
            }else{
                marker.setLatLng(e.latlng).addTo(drawnItems);

            }
    $('#fr_latitude').val( e.latlng.lat);
    $('#fr_longitude').val( e.latlng.lng);
    judul=$('#judul').val();
    deskripsi=$('#deskripsi').val();
    json= `"type": "Feature","properties": {"judul":"`+judul+`", "deskripsi":"`+deskripsi+`"},"geometry": {"coordinates": [`+e.latlng.lat+`,`+e.latlng.lng+`],"type": "Point"}`
                        $('#json').val( json);
                        $('#latlng').val(e.latlng.lat+`,`+e.latlng.lng);
	}
    // $('#json').val( json);

	map.on('click', onMapClick);
  

</script>



@endsection
