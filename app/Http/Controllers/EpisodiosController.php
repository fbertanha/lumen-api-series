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
}
