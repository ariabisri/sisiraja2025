<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature;
use App\Models\Layer;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return("udah bisa");
    }
    public function showFeaturesByLayer($id)
    {
        //
        
    
        return view('feature.index', compact('id'));
    }

    public function getFeaturesByLayer(Request $request)
    {
        $layerIds = $request->input('layer_ids'); // Menerima array ID layer dari request

        if (!$layerIds || !is_array($layerIds)) {
            return response()->json(['error' => 'Parameter layer_ids harus berupa array'], 400);
        }

        // Ambil feature yang terkait dengan layer yang diminta
        $layers = Layer::whereIn('id', $layerIds)->with('features')->get();

        return response()->json($layers);
        // $layer = Layer::with('features')->findOrFail($id);

        // return response()->json([
        //     'layer_name' => $layer->nama_layer,
        //     'features' => $layer->features,
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('feature.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->layer_id);
        $data = $request->all();
        if($request->hasFile('icon')){

            $data['icon'] = $request->file('icon')->store('feature_icon', 'public');
            
        }
        // dd($request->all());
        if (Feature::create($data))
        {
                        
            return redirect()->route('showfeatures.byLayer', ['id'=>$request->layer_id])->with('success', 'Feature berhasil ditambahkan');
           
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    }
}
