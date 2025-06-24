<?php

namespace App\Http\Controllers;

use App\Models\Terrain;
use App\Http\Requests\StoreTerrainRequest;
use App\Http\Requests\UpdateTerrainRequest;
use Illuminate\Http\Request;

class TerrainController extends Controller
{
    public function index()
    {
        $terrains = Terrain::with('owner', 'images')->get();
        return response()->json($terrains);
    }

    public function store(StoreTerrainRequest $request)
    {
        $terrain = Terrain::create($request->validated());
        return response()->json($terrain, 201);
    }

    public function show(Terrain $terrain)
    {
        $terrain->load('owner', 'images', 'bookings', 'reviews');
        return response()->json($terrain);
    }

    public function update(UpdateTerrainRequest $request, Terrain $terrain)
    {
        $terrain->update($request->validated());
        return response()->json($terrain);
    }

    public function destroy(Terrain $terrain)
    {
        $terrain->delete();
        return response()->json(null, 204);
    }
}
