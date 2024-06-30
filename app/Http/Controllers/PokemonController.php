<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\pokemon;
use Illuminate\Http\Request;

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
        // dd($results);
        return view('viewPoke',['results'=>$results]);
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
