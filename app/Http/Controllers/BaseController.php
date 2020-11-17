<?php


namespace App\Http\Controllers;


use App\Models\Serie;
use Illuminate\Http\Request;

abstract class BaseController
{

   protected $classe;

    /**
     * BaseController constructor.
     * @param $classe
     */
    public function __construct($classe)
    {
        $this->classe = $classe;
    }


    public function index(Request $request)
    {
        return $this->classe::paginate($request->per_page);
    }

    public function store(Request $request)
    {

        return response()->json(
            $this->classe::create($request->all()),
            201);
    }

    public function find(int $id)
    {
        $recurso = $this->classe::find($id);
        if (is_null($recurso)) {
            return response()->json(null, 204);
        }
        return response()->json($recurso, 200);
    }

    public function update(int $id, Request $request)
    {
        $recurso = $this->classe::find($id);
        if (is_null($recurso)) {
            return response()->json(
                ['error' => 'recurso not found'],
                404);
        }
        //$recurso->fill(['nome' => $request->nome]);
        $recurso->fill($request->all());
        $recurso->save();

        return response()->json($recurso, 200);
    }

    public function destroy(int $id)
    {
        $qtdRecursosRemovidos = $this->classe::destroy($id);

        if ($qtdRecursosRemovidos == 0) {
            return response()->json(
                ['error' => 'serie not found'],
                404);
        }
        return response()->json(null, 204);
    }
}
