<?php

namespace App\Http\Controllers;

use App\Models\Map;
use Illuminate\Http\Request;

class MapController extends Controller
{
    //Map index
    // public function index()
    // {
    //     $data = Map::all();
    //     return view('map.index', compact('data'));
    // }

    // public function edit(Request $request,$id)
    // {
    //     $data = Map::find($id);

    //     return view('map.edit' ,compact('data'));
    // }

    // public function update(Request $request,$id)
    // {

    // }

    public function index()
    {
        $data = Map::all();
        return view('map.index', compact('data'));
    }

    public function getData()
    {
        
        // Ambil semua data map dari database
        $map = Map::select(['id', 'name', 'description'])->get();
        return response()->json($map);
    
    }

    public function create()
    {
        //
        return view('map.create');
    }

    public function store(Request $request)
    {
        

        // dd ($request);
      
        // $request->validate([
        //     'name'  => 'required|string|max:255',
        //     'description' => 'nullable|string',
        //     'layer_ids' => 'required|array', // Pastikan layer dikirim sebagai array
        //     'layer_ids.*' => 'exists:layers,id' // Validasi setiap ID layer harus ada
        // ]);

        // Simpan map baru
        $map = Map::create([
            'name'  => $request->name,
            'description' => $request->description,
        ]);
        
        // Hubungkan map dengan layer (many-to-many)
        $map->layers()->attach($request->layer_ids);

        // return response()->json(['message' => 'Map berhasil disimpan!'], 201);
        return redirect()->route('map.index')->with('success', 'Map berhasil disimpan');
    }
}
