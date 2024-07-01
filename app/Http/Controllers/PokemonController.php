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
        $pokemons = Http::get('https://pokeapi.co/api/v2/pokemon?limit=10')->json();
        $lenPokemon = count($pokemons["results"]);
        for ($i = 0; $i < $lenPokemon; $i++) {
            $results[$i]["name"] = $pokemons["results"][$i]["name"];
            $pokemonName = $results[$i]["name"];
            $pokemon = Http::get("https://pokeapi.co/api/v2/pokemon/$pokemonName")->json();
            $results[$i]["img"] = $pokemon["sprites"]["front_default"];
        }
        $results = $this->paginate($results);
        $url = url()->full();
        $url = (explode("=", $url)); // buat ambil per_page
        $short_url = $url[1] ?? 1;
        return view('viewPoke', ['results'=>$results, 'short_url'=>$short_url]);
    }

    public function paginate($items, $perPage = 4, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
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
