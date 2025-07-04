@extends('layout.app')

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
                            <h3 class="card-title">Daftar Layer</h3>
                            <div class="card-tools">
                                <a href="{{route("layer.create")}}" class="badge badge-success float-left mr-2">+ Tambah Layer</a>
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
                            <table class="table table-hover text-nowrap" id="datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Layer</th>
                                        <th>Deskripsi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $d->nama_layer }}</td>
                                        <td>{{ $d->deskripsi }}</td>
                                        <td>{{ $d->feature }}</td>
                                        <td>
                                            <a href="{{ route('map.edit', ['id' => $d->id]) }}" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                                            <a data-toggle="modal" onclick="deleteLayer({{ $d->id }})" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                                        </td>
                                    </tr>
                                    @endforeach --}}
                                </tbody>
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

    function deleteLayer(layerId) {
    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Data akan dihapus secara permanen!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Ya, hapus!"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/layer/" + layerId,
                type: "POST",
                data: {
                    _method: "DELETE",
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil!",
                        text: "Layer telah dihapus.",
                        showConfirmButton: false,
                        timer: 2000
                    });
                    $('#datatable').DataTable().ajax.reload();
                    // Hapus elemen dari tampilan
                    // $("#layer-" + layerId).remove();
                    // $('#datatable').DataTable().ajax.reload();
                },
                error: function(error) {
                    console.log(error);
                    Swal.fire({
                        icon: "error",
                        title: "Gagal!",
                        text: "Terjadi kesalahan saat menghapus layer.",
                    });
                }
            });
        }
    });
}
   var datalayer; 
function loadLayers() {
    $.ajax({
    url: "/layer/data/json", // URL API Laravel
    type: "GET", // Request type
    dataType: "json", // Data yang diharapkan JSON
    // contentType: false,
    // processData: false
    success: function(response) {
        
        console.log(response); // Cek response di console
        // processData(response);
        datalayer=response;
        console.log(datalayer);
        response.forEach(layer => {
            console.log(layer.id);
            console.log(layer.nama_layer);
            console.log(layer.deskripsi);
            
            //     <tr>
            //         <td>${layer.id}</td>
            //         <td>${layer.nama_layer}</td>
            //         <td>${layer.deskripsi}</td>
            //     </tr>
            // ;
        });
    },
    error: function(xhr, status, error) {
        console.error("Terjadi kesalahan: ", error);
    }
});

}

// Panggil loadLayers() saat halaman selesai dimuat
// $(document).ready(function() {
//     loadLayers();
// });

$(document).ready(function() {
    $('#datatable').DataTable({
        ajax: {
            url: "{{ url('/layer/data/json') }}", // Route Laravel
            type: "GET",
            dataSrc: ""
        },
        columns: [
            { 
                data: null, // Tidak mengambil dari database
                render: function(data, type, row, meta) {
                    return meta.row + 1; // Menampilkan nomor urut (dimulai dari 1)
                }
            },
            { data: "nama_layer" },
            { data: "deskripsi" },
            {
                data: null,
                render: function(data, type, row) {
                    return `
                        <div class = "float-right btn-group" role="group">
                        <a href="{{ route('layer.edit', ['layer' =>9]) }}" class="btn-sm btn-primary"><i class="fas fa-pen"></i> Edit</a>
                        <a data-toggle="modal" onclick="deleteLayer(${row.id})" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                        <a href="layers/${row.id}/features/show" class=" btn btn-sm btn-success"><i class="fa fa-thumbtack"></i> Daftar Feature</a>
                        <a href="layer/${row.id}" class=" btn btn-sm btn-warning"><i class="fa fa-map-marker""></i>Lihat Layer</a>
                        </div>
                    `;
                }
            }
        ]
    });
});

    
</script>
@endsection
