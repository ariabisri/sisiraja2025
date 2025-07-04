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
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                        <h3 class="card-title">Tambah Layer</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('layer.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="card-body">
                            <div class="form-group">
                            <label for="nama_layer">Nama Layer</label>
                            <input type="text" class="form-control" id="nama_layer" name="nama_layer" placeholder="Nama layer" required oninvalid="this.setCustomValidity('Isi Nama Layer')" 
                            onvalid="this.setCustomValidity('')" onchange="this.setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea id='deskripsi' name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi ..." required oninvalid="this.setCustomValidity('Isi Deskripsi')"
                                onvalid="this.setCustomValidity('')" onchange="this.setCustomValidity('')"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="feature_op">Jenis Feature</label>
                                <select class="form-control" id ="feature_op" name="feature" required oninvalid="this.setCustomValidity('Pilih Feature')"
                                onvalid="this.setCustomValidity('')"
                                onchange="this.setCustomValidity('')">
                                  <option value="">-Pilih Feature-</option>
                                  <option value="marker">Marker</option>
                                  <option value="Polygon">Polygon</option>
                                  <option value="Circle">Circle</option>
                                  <option value="Line">Line</option>
                                </select>
                                @error('feature_op')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="geojson">Upload Geojson</label>
                                <input class="form-control-file" type="file" name="json" accept=".geojson, application/json">
                                @error('geojson')
                                  <small>{{ $message }}</small>
                              @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->
        
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
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
