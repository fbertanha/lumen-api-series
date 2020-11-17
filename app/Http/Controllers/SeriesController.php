<?php


namespace App\Http\Controllers;


use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController
{
    public function index()
    {
        return Serie::all();
    }

    public function store(Request $request)
    {

        return response()->json(
            Serie::create(['nome' => $request->nome]),
            201);
    }

    public function find(int $id)
    {
        $serie = Serie::find($id);
        if (is_null($serie)) {
            return response()->json(null, 204);
        }
        return response()->json($serie, 200);
    }

    public function update(int $id, Request $request)
    {
        $serie = Serie::find($id);
        if (is_null($serie)) {
            return response()->json(['error' => 'serie not found'], 404);
        }
        //$serie->fill(['nome' => $request->nome]);
        $serie->fill($request->all());
        $serie->save();

        return response()->json($serie, 200);
    }
}
