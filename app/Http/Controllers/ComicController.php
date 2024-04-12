<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        //variabile creata li
        //salvare i dati nella variabile 
          $comics = Comic::all();
    //quetso sotto per fare un console log dei 12 elementi, serve avere sistemato la rotta però verso la funzione index
    //dd($comics);

    //qui chiamo la cartella comic che contiene (index ecc) e grazie a questo commando insieme alle rotte
    //che riuscirò a vedere qello che sta nel file index nella cartella comic in pagina.
    return view("comic/index", compact("comics")); 

}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("comic/create");
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
    public function show(string $id)
     //per accedere alle pagine che mostrano queste pagine variabili secondo gli id
     //basta digitare il commando che fa vedere le rotte nel terminale e cercare "show"
     //per capire l'url adeguato..nel nostro caso è "comics/{indice}" al cambiare dell'indice
     //cambi pagina 
    {
        
        //variabile creata li
        //salvare i dati nella variabile
        $comic = Comic::find($id);
        //dd($comic);

        return view("comic/show",compact("comic"));
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
