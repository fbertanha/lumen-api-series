<?php


namespace App\Http\Controllers;


use App\Models\Episodio;
use Illuminate\Http\Request;

class EpisodiosController extends BaseController
{

    /**
     * EpisodiosController constructor.
     */
    public function __construct()
    {
        $this->classe = Episodio::class;
    }

    public function buscaPorSerie(int $serieId)
    {
        $episodios = Episodio::query()
            ->where('serie_id', $serieId)
            ->paginate();

        return $episodios;
    }
}
