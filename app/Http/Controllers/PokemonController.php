<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\pokemon;
use Illuminate\Http\Request;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $pokemons = Http::get('https://pokeapi.co/api/v2/pokemon?limit=23')->json();
        $lenPokemon = count($pokemons["results"]);
        for ($i = 0; $i < $lenPokemon; $i++) {
            $results[$i]["name"] = $pokemons["results"][$i]["name"];
            $pokemonName = $results[$i]["name"];
            $pokemon = Http::get("https://pokeapi.co/api/v2/pokemon/$pokemonName")->json();
            $results[$i]["img"] = $pokemon["sprites"]["front_default"];
        }
        $perPage = 8;
        $results = $this->paginate($results, $perPage);
        $lastPage = $results->lastPage();
        return view('viewPoke', ['results'=>$results, 'lastPage'=>$lastPage, 'perPage'=>$perPage]);
    }

    public function paginate($items, $perPage, $page = null, $options = []) {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function paginate2($perPage = 15, $columns = ['*'], $pageName = 'page', $page = null) {
        $page = $page ?: Paginator::resolveCurrentPage($pageName);
        $total = $this->getCountForPagination($columns);
        $results = $total ? $this->forPage($page, $perPage)->get($columns) : [];
        return new LengthAwarePaginator($results, $total, $perPage, $page, [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => $pageName,
        ]);
    }

    public function toArray($results) {
        return [
            'data' => $this->items->toArray(),
            'meta' => [
                'pagination' => [
                    'current_page' => $this->currentPage(),
                    'first_page_url' => $this->url(1),
                    'from' => $this->firstItem(),
                    'last_page' => $this->lastPage(),
                    'last_page_url' => $this->url($this->lastPage()),
                    'next_page_url' => $this->nextPageUrl(),
                    'path' => $this->path(),
                    'per_page' => $this->perPage(),
                    'prev_page_url' => $this->previousPageUrl(),
                    'to' => $this->lastItem(),
                    'total' => $this->total(),
                ],
            ],
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(pokemon $pokemon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pokemon $pokemon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pokemon $pokemon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pokemon $pokemon)
    {
        //
    }
}
