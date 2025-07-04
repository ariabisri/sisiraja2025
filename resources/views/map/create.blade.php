@extends('layout.app')
@section ('style')
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="{{ asset ('LTE/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}" >
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
                    <h1 class="m-0">Layer</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Layer</li>
                        <form action="{{ route('actionlogout') }}" method="POST" style="display:inline;">
                          @csrf
                          <button type="submit" class="btn btn-danger">Logout</button>
                      </form>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        {{-- <a href="{{ route('map.create') }}" class="btn btn-primary">Tambah Map</a> --}}
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-primary">
                                <div class="card-header">
                                <h3 class="card-title">Tambah Map</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ route('map.store') }}" method="POST">
                                    @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                    <label for="nama_layer">Judul Map</label>
                                    <input type="text" class="form-control" id="nama_layer" name="name" placeholder="Nama layer" required oninvalid="this.setCustomValidity('Isi Judul Map')" 
                                    onvalid="this.setCustomValidity('')" onchange="this.setCustomValidity('')">
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea id='deskripsi' name="description" class="form-control" rows="3" placeholder="Deskripsi ..." required oninvalid="this.setCustomValidity('Isi Deskripsi')"
                                        onvalid="this.setCustomValidity('')" onchange="this.setCustomValidity('')"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                          <div class="form-group">
                                            <label>Pilih Layer</label>
                                            <select class="duallistbox" multiple="multiple" id="selectlayer" name='layer_ids[]'>
                                              {{-- <option selected>Alabama</option>
                                              <option>Alaska</option>
                                              <option>California</option>
                                              <option>Delaware</option>
                                              <option>Tennessee</option>
                                              <option>Texas</option>
                                              <option>Washington</option> --}}
                                            </select>
                                          </div>
                                          <!-- /.form-group -->
                                        </div>
                                        <!-- /.col -->
                                      </div>
                                </div>
                                <!-- /.card-body -->
                
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card card-default">
                                <div class="card-header">
                                  <h3 class="card-title">Map</h3>
                                  <button id="btn-refresh" class="btn btn-xs btn-danger"><i style="font-size:12px" class= "fa fa-sync"></i></button>
                      
                                  <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                      <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                      <i class="fas fa-times"></i>
                                    </button>
                                  </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body"id="map_preview" style="width: 100%; height: 450px">
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                  Visit <a href="https://github.com/istvan-ujjmeszaros/bootstrap-duallistbox#readme">Bootstrap Duallistbox</a> for more examples and information about
                                  the plugin.
                                </div>
                              </div>
                              <!-- /.card -->
                        </div>
                    </div>
                    <!-- general form elements -->
                    
              <!-- /.card -->
                    
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
@section('script')
<script src={{asset ('LTE/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}> </script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-draw/dist/leaflet.draw.js"></script>

<script>
   const map = L.map('map_preview').setView([-6.737349, 107.004481], 8);

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
</script>
<script>
    // $("#selectlayer").append('<option>lima</option>')
    // $("#selectlayer").append('<option>tujuh</option>')
    $('.duallistbox').bootstrapDualListbox();
</script>
<script>
    function loadLayers() {
    $.ajax({
        url: "{{ route('layer.json') }}", // URL endpoint Laravel
        type: "GET",
        dataType: "json",
        success: function(response) {
            let select = $("#selectlayer");
            console.log(response);
            $.each(response, function (index, layer) {
                console.log(layer.id);
                select.append('<option value="' + layer.id + '">' + layer.nama_layer + '</option>');
                $('.duallistbox').bootstrapDualListbox('refresh', true);
            });
           },
        error: function(xhr) {
            console.error("Terjadi kesalahan saat mengambil data:", xhr);
        }
    });
   
}

function loadfeaturebylayer(id)
{
    return new Promise(function(resolve, reject) {

        $.ajax({
            url: "/layers/features", // URL endpoint Laravel
            type: "GET",
            data: {layer_ids:id},
            dataType: "json",
            success: function(response) {
                console.log(response);
                resolve (response);
                // features = response.features;
                // $.each(features, function (index, feature) {
                //     console.log(feature.id);
                //     latlangsplit = feature.latlng.split(',').map(Number);
                //     L.marker(latlangsplit).bindPopup(feature.deskripsi).addTo(map);
                    
                // });
               },
            error: function(xhr) {
                console.error("Terjadi kesalahan saat mengambil data:", xhr);
                reject(error);
            }
        });
    });
}

let datalayer;
let contol;
let layerGroup;
let layersControl = {}; // Objek untuk menyimpan layer
let geoLayer;

async function fetchDataLayer(id) {
    
    if (contol){
                map.removeControl(contol);
                Object.values(layersControl).forEach(layer => {
                if (map.hasLayer(layer)) {
                    map.removeLayer(layer); // Hapus layer lama
                }
               
        });
        layersControl = {};
                
            }
    $.each(layersControl, function (index, layer){layer.clearLayers();});

    if (id.length!=0){
        try {
            datalayer = await loadfeaturebylayer(id); // Tunggu hingga AJAX selesai
            // console.log("Data diterima:", datalayer);
            
            $.each(datalayer, function (index, layer) {
                layerGroup = L.layerGroup();
                if(layer.geojson_path){
                    json = fetch('/storage/'+layer.geojson_path)
        
                        .then(response => response.text()) // Ambil sebagai teks
                        .then(text => {
                            let jsonData = JSON.parse(text); // Ubah teks menjadi JSON
                            console.log(jsonData);
                            // L.geoJSON(jsonData).addTo(layerGroup);
                            layerGroup = L.geoJSON(jsonData);
                            layerGroup.addTo(map);
                            layersControl[layer.nama_layer] = layerGroup;
                            // contol = L.control.layers(null, layersControl).addTo(map);
                            if (contol) {
                            contol.addOverlay(layerGroup, layer.nama_layer);
                        }
                        })
                        .catch(error => console.error("Error fetching JSON:", error));
                        
                        // layersControl[layer.nama_layer] = layerGroup;
                        // layerGroup.addTo(map); 

                } else {

                    features = layer.features;
                    $.each(features, function (index, feature) {
                        // console.log(feature.id);
                    latlangsplit = feature.latlng.split(',').map(Number);
                    L.marker(latlangsplit).bindPopup(feature.deskripsi).addTo(layerGroup);
                    });
                    layerGroup.addTo(map);
                    layersControl[layer.nama_layer] = layerGroup;
                    // if (!contol) {
                    //     contol = L.control.layers(null, layersControl).addTo(map);
                    // } else {
                    //     contol.addOverlay(layerGroup, layer.nama_layer); // Jika kontrol sudah ada, tambahkan overlay baru
                    // }
                }
               

                // layerGroup.addTo(map); // Tampilkan di peta
                // layersControl[layer.nama_layer] = layerGroup; // Tambahkan ke layer control
            });
            
            // if (contol !=null){map.removeControl(contol);}
            // contol = L.control.layers(null, layersControl).addTo(map);
            // contol.addOverlay(layerGroup, layer.nama_layer);
            // contol.addOverlay(geoLayer, nama_layer);
            // console.log(contol);
            contol = L.control.layers(null, layersControl).addTo(map);
        } catch (error) {console.log("Gagal mendapatkan data:", error); }

    }
}






   
    // Panggil loadLayers() saat halaman selesai dimuat
    $(document).ready(function() {
        loadLayers();
        // loadfeaturebylayer([9,10]);
        // loadMap()
        
        
    });

    

    $("#btn-refresh").on("click", function(){
        map.removeControl(contol);
        // $.each(layersControl, function (index, layer){
        //     layer.clearLayers();

        // });
        // layerGroup.clearLayers();
        // map.eachLayer(function(layer) {
        //     if (!layer._url) { // Jangan hapus base map (tile layer)
        //         map.removeLayer(layer);
        //     }
        // });
        // if (layersControl) {
        // map.removeControl(contol);
        // layersControl = null;
    // }
    });

    $("#selectlayer").on("change", function() {
        // if (contol =! null){

        //     map.removeControl(contol);
        // }
    // alert("Pilihan berubah menjadi:" + $(this).val());

//     map.eachLayer(function(layer) {
//     if (layer !== baseMapLayer) { // Ganti baseMapLayer sesuai dengan layer basemap utama
//         map.removeLayer(layer);
//     }
// });

// Hapus semua kontrol
// if (layerControl) map.removeControl(layerControl);
// if (scaleControl) map.removeControl(scaleControl);
// map.zoomControl.remove();
// map.attributionControl.remove();

// Hapus LayerGroup jika ada
// if (layerGroup) layerGroup.clearLayers();
// if (featureGroup) featureGroup.clearLayers();





    
        // map.eachLayer(function(layer) {
        //     if (!layer._url) { // Jangan hapus base map (tile layer)
        //         map.removeLayer(layer);
        //     }
        // });
        
        console.log($(this).val());
        // alert($(this).val());
        fetchDataLayer($(this).val())
        // alert (datalayer);
        // console.log(loadedlayers);
        
   
    
});


</script>

@endsection
