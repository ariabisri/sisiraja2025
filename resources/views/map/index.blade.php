@extends('layout.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Feature</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Feature</a></li>
                        <li class="breadcrumb-item active">Map</li>
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
                    <div class="card">
                        <div class="card-header mb-2">
                            <h3 class="card-title" id="layerTitle"></h3>
                            <div class="card-tools">
                                <a href="{{route("map.create")}}" class="badge badge-success float-left mr-2">+ Tambah Map</a>
                                {{-- <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-bordered"  id="featuresTable" >
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        {{-- <th>Nama Feature</th> --}}
                                        <th>Judul Map</th>
                                        <th>Deskripsi</th>
                                        {{-- <th>LatLng</th>
                                        <th>Icon</th> --}}
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection
@section ('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
//     new DataTable('#example', {
//     ajax: 'data/arrays.txt'
// });
//     $(function () {
//     $('#datatable').DataTable({
//     "ajax" : 
//       "paging": true,
//       "lengthChange": false,
//       "searching": true,
//       "ordering": true,
//       "info": true,
//       "autoWidth": false,
//       "responsive": true,
//     });
//   });
</script>
<script>
    @if (session('success'))
        Swal.fire({
        title: "Berhasil",
        text: "{{ session('success') }}",
        icon: "success"
        });
    @endif
</script>
<script>
   $(document).ready(function() {
    // $("#layerSelect").change(function() {
    //     let layerId = $(this).val(); // Ambil ID layer yang dipilih
        
        $.ajax({
            url: `/map/data/json`,
            type: "GET",
            success: function(response) {
                let tbody = $("#featuresTable tbody");
                tbody.empty(); // Kosongkan tabel sebelum menampilkan data baru
                
                // Set Nama Layer sebagai judul
                $("#layerTitle").text("Daftar Map");
                $('#featuresTable').DataTable({
                    data:response,
                    columns: [
                        { data: "id" },
                        { data: "name" },
                        { data: "description" },
                        // { data: "deskripsi" },
                        // { data: "latlng" },
                        {
                            data: null,
                            render: function(data, type, row) {
                                return `
                                    <div class = "float-right btn-group" role="group">
                                    <a href="{{ route('layer.edit', ['layer' =>'11']) }}" class="btn-sm btn-primary"><i class="fas fa-pen"></i> Edit</a>
                                    <a data-toggle="modal" onclick="deleteLayer(${row.id})" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                                    </div>
                                `;
                            }
                        }
                    ]
                });

                // response.features.forEach(feature => {
                //     tbody.append(`
                //         <tr>
                //             <td>${feature.id}</td>
                //             <td>${feature.nama}</td>
                //             <td>${feature.judul}</td>
                //             <td>${feature.deskripsi}</td>
                //             <td>${feature.latlng}</td>
                //             <td><img src="${feature.icon}" width="30"></td>
                //         </tr>
                //     `);
                // });
            },
            error: function(xhr) {
                alert("Terjadi kesalahan: " + xhr.responseText);
            }
        });
    });

//     $(document).ready(function() {
//     $('#featuresTable').DataTable({
//         ajax: {
//             url:`/layers/9/features`, // Route Laravel
//             type: "GET",
//             dataSrc: "features" // Data berasal dari array langsung
//         },
//         columns: [
//             { data: "id" },
//             { data: "nama" },
//             { data: "judul" },
//             { data: "deskripsi" },
//             { data: "latlng" },
//             { data: "icon" },
//             {
//                 data: null,
//                 render: function(data, type, row) {
//                     return `
//                         <div class = "float-right btn-group" role="group">
//                         <a href="{{ route('layer.edit', ['layer' =>'11']) }}" class="btn-sm btn-primary"><i class="fas fa-pen"></i> Edit</a>
//                         <a data-toggle="modal" onclick="deleteLayer(${row.id})" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
//                         <a href="{{ route('feature.index', ['layer' =>'11']) }}" class=" btn btn-sm btn-success"><i class="fa fa-thumbtack"></i> Daftar Feature</a>
//                         </div>
//                     `;
//                 }
//             }
//         ]
//     });
// });
</script>
@endsection
