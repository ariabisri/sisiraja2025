@extends('layout.app')
@section('style')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-draw/dist/leaflet.draw.css" />
@endsection
@section('content')
<input type="hidden" value="{{$data->polygon}}">
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
            <form action="{{ route('map.update',['id' => $data->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-3">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="card card-primary collapsed-card">
                            <div class="card-header">
                              <h3 class="card-title">Informasi Peta</h3>
                              <div class="card-tools">
                                <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                                  <i class="fas fa-plus"></i>
                                </button>
                              </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Judul</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{ $data->name }}" placeholder="Enter email">
                                @error('email')
                                    <small>{{ $message }}</small>
                                @enderror
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputUsername1">Deskripsi</label>
                                  <textarea class="form-control" id="exampleInputUsername1" name="username" value="{{ $data->description }}" placeholder="Isi deskripsi"></textarea>
                                  @error('username')
                                    <small>{{ $message }}</small>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Zoom</label>
                                <input type="email" class="form-control" id="zoom" name="email" value="{{ $data->zoom }}" placeholder="Enter email">
                                @error('email')
                                    <small>{{ $message }}</small>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Latitude</label>
                                <input type="email" class="form-control" id="latitude" name="email" value="{{ $data->latitude}}" placeholder="Enter email">
                                @error('email')
                                    <small>{{ $message }}</small>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Longitude</label>
                                <input type="email" class="form-control" id="longitude" name="email" value="{{ $data->longitude}}" placeholder="Enter email">
                                @error('email')
                                    <small>{{ $message }}</small>
                                @enderror
                              </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                          </div>
                          <!-- /.card -->
                        </div>
                        <div class="col-md-12">
                          <div class="card card-primary collapsed-card">
                            <div class="card-header">
                              <h3 class="card-title">Layer</h3>
                              <div class="card-tools">
                                <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                                  <i class="fas fa-plus"></i>
                                </button>
                              </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <input type='text' name="text" id="userinput" />
                              <button id="enter" >add to list</button>
                              <ul id="view">
                              </ul>
                              
                              
                              
                              
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                          </div>
                          <!-- /.card -->
                        </div>
                        <div class="col-md-12">
                          <div class="card card-primary collapsed-card">
                            <div class="card-header">
                              <h3 class="card-title">Feature</h3>
                              <div class="card-tools">
                                <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                                  <i class="fas fa-plus"></i>
                                </button>
                              </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Feature</label>
                                <select class="form-control" id ="feature_op">
                                  <option>-Pilih Feature-</option>
                                  <option value="marker">Marker</option>
                                  <option value="Polygon">Polygon</option>
                                  <option value="Circle">Circle</option>
                                  <option value="Line">Line</option>
                                </select>
                                @error('email')
                                    <small>{{ $message }}</small>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Layer</label>
                                <select class="form-control" id="layer">
                                </select>
                                @error('email')
                                    <small>{{ $message }}</small>
                                @enderror
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputUsername1">Deskripsi</label>
                                  <textarea class="form-control" id="exampleInputUsername1" name="username" value="{{ $data->description }}" placeholder="Isi deskripsi"></textarea>
                                  @error('username')
                                    <small>{{ $message }}</small>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Latitude</label>
                                <input type="email" class="form-control" id="latitude" name="email" value="{{ $data->latitude}}" placeholder="Enter email">
                                @error('email')
                                    <small>{{ $message }}</small>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Longitude</label>
                                <input type="email" class="form-control" id="longitude" name="email" value="{{ $data->longitude}}" placeholder="Enter email">
                                @error('email')
                                    <small>{{ $message }}</small>
                                @enderror
                              </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
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
                        <div class="card-body" id="map" style="width: 100%; height: 400px">
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


  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Default Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="dataForm">
            <div class="mb-3">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" class="form-control" id="fr_latitude" name="latitude" required>
            </div>
            <div class="mb-3">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="text" class="form-control" id="fr_longitude" name="longitude" required>
            </div>
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="fr_judul" name="judul" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="fr_deskripsi" name="deskripsi" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" id="bt_add_feature" class="btn btn-primary">Sisipkan pada Peta</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@endsection
@section ('script')
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-draw/dist/leaflet.draw.js"></script>

<script>
 
  var map = L.map('map').setView([{{  $data->latitude }}, {{ $data->longitude }}],
      {{  $data->zoom }});

  function getTileLayerUrl(mapType) {
      switch (mapType) {
          case 'satellite':
              return 'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}';
          case 'topography':
              return 'https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png';
          default:
              return 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
      }
  }

  var tileLayer = L.tileLayer(getTileLayerUrl('{{ old('map_type', $data->map_type) }}'), {
      maxZoom: 19,
      attribution: '&copy; OpenStreetMap contributors'
  }).addTo(map);

  var drawnItems = new L.FeatureGroup();
     map.addLayer(drawnItems);
     var drawControl = new L.Control.Draw({
         edit: {
             featureGroup: drawnItems
         }
     });
     map.addControl(drawControl);

     map.on(L.Draw.Event.CREATED, function (event) {
        var layer = event.layer;

        drawnItems.addLayer(layer);
    });

     

  // document.getElementById('map_type').addEventListener('change', function() {
  //     tileLayer.setUrl(getTileLayerUrl(this.value));
  // });

  var MarkerOptions = {
            iconUrl: '/images/marker_merah.png',
            iconSize: [40, 41],
            iconAnchor: [20, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        };

  var polygonData = {!! $data->polygon !!}; //@json($data->polygon);
  console.log(polygonData);
        L.geoJSON(polygonData, {
          pointToLayer: function (feature, latlng) {
        return L.marker(latlng,   { icon: L.icon({
            iconUrl: '/images/marker_merah.png',
            iconSize: [40, 41],
            iconAnchor: [20, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        })});
    },
            onEachFeature: function(feature, layer) {
              console.log(feature.properties.name);
                if (feature.properties && feature.properties.name) {
                    layer.bindTooltip(
                        `<b>${feature.properties.name}</b><br>${feature.properties.description}`
                    );
                }
                drawnItems.addLayer(layer);
            }
        });

  function updateMapInputs() {
      document.getElementById('latitude').value = map.getCenter().lat.toFixed(6);
      document.getElementById('longitude').value = map.getCenter().lng.toFixed(6);
      document.getElementById('zoom').value = map.getZoom();
  }

  map.on('moveend', function() {
      updateMapInputs();
  });
  map.on('zoomend', function() {
      updateMapInputs();
  });

  const popup = L.popup();

  function onMapClick(e) {
		popup
			.setLatLng(e.latlng)
			.setContent( `${e.latlng.toString()}`)
			.openOn(map);
    L.marker(e.latlng).addTo(drawnItems );
	}

	map.on('click', onMapClick);
  


  

 
</script>
<script>
  var button = document.getElementById("enter");
  var input = document.getElementById("userinput");
  var ul = document.getElementById("view");
  var ul_layer = document.getElementById("layer");

  function inputLength() {
    return input.value.length;
  }

  function createListElement() {
    var li = document.createElement("li");
    var op = document.createElement("option")
    li.appendChild(document.createTextNode(input.value));
    li.addEventListener("click", toggleDone);
    ul.appendChild(li);
    op.appendChild(document.createTextNode(input.value));
    ul_layer.appendChild(op);
    input.value = "";

    var bt = document.createElement("button");
    bt.onclick = remov;
    bt.innerHTML = "remove";
    li.appendChild(bt);
    ul.appendChild(li);
    
    
    function remov() {
      li.remove();
      op.remove();
    }

    function toggleDone() {
      li.classList.toggle("done");
    }
  }

  function addListAfterClick() {
    if (inputLength() > 0) {
      createListElement();
    }
  }

function addListAfterKeypress(event) {
  if (inputLength() > 0 && event.keyCode === 13) {
    createListElement();
  }
}

button.addEventListener("click", addListAfterClick);

input.addEventListener("keypress", addListAfterKeypress);

$('#feature_op').on('change', function() {
  // alert(this.value)
  if (this.value == "marker"){

    $('#modal-default').modal('show');
  }
});

$('#bt_add_feature').on('click', function(){
  let fr_latitude = document.getElementById('fr_latitude').value;
  let fr_longitude = document.getElementById('fr_longitude').value;
  let fr_judul = document.getElementById('fr_judul').value;
  let fr_deskripsi = document.getElementById('fr_deskripsi').value;

  if (!fr_latitude || !fr_longitude || !fr_judul || !fr_deskripsi) {
      alert('Semua field harus diisi!');
      return;
  }

 

  L.marker([fr_latitude, fr_longitude]).addTo(drawnItems)
    .bindPopup('<b>' + fr_judul + '</b><br>' + fr_deskripsi)
    .openPopup();

});

</script>
@endsection
