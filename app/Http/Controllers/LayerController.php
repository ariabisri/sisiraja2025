<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layer;

class LayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Layer::all();
        return view ('layer.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Layer::all();
        return view ('layer.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->file('json')->getMimeType());
        $request->validate([
            'nama_layer' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'feature' => 'nullable|string',
            // 'json' => 'nullable|file|mimes:json,geojson',
        ]);
        $data = $request->all();
        if($request->hasFile('json')){
            
            $data['geojson_path']= $request->file('json')->store('json', 'public');
            
        } 
        // $path = $request->file('geojson')->store('geojson_files', 'public');

        // Baca isi file
        // $geojsonData = file_get_contents(storage_path("app/public/" .  $data['geojson_path']));

        // Ubah JSON ke array PHP
        // $geojsonArray = json_decode($geojsonData, true);

        // if (!$geojsonArray) {
        //     return back()->with('error', 'File GeoJSON tidak valid!');
        // }

        // $geojson_data = json_encode($geojsonArray);
        // $data['json'] = json_encode($geojsonArray);
        if (Layer::create($data))
        {
                        
            return redirect()->route('layer.index')->with('success', 'Layer berhasil ditambahkan');
           
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $layer = Layer::with('features')->findOrFail($id);

        $data = json_encode([
            'layer_name' => $layer->nama_layer,
            'geojson_path'=>$layer->geojson_path,
            'features' => $layer->features,
        ]);
        // dd($data);
        return view('layer.show', compact('data', 'layer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $layer = Layer::find($id);
    
        if (!$layer) {
            return response()->json(['message' => 'Layer tidak ditemukan'], 404);
        }

        $layer->delete();

        return redirect()->route('layer.index')->with('success', 'Layer berhasil dihapus');
        // response()->json(['message' => 'Layer berhasil dihapus','status'=>'success']);
    }

    public function getData()
    {
        // Ambil semua data layer dari database
        $layers = Layer::select(['id', 'nama_layer', 'deskripsi'])->get();
        return response()->json($layers);
    }
}
