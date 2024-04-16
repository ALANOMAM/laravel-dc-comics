<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComicRequest;
use App\Models\Comic;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComicController extends Controller
{
    /** 
     * Display a listing of the resource.
     */
    public function index()
    {
        
        //variabile creata sul momento, non centra on gli altri comic
        //salvare i dati nella variabile 
        //Comic è il nome del mondello
          $comics = Comic::all();
    //quetso sotto per fare un console log dei 12 elementi, serve avere sistemato la rotta però verso la funzione index
    //dd($comics);

    //qui chiamo la cartella comic che contiene (index ecc) e grazie a questo commando insieme alle rotte
    //che riuscirò a vedere qello che sta nel file index nella cartella comic in pagina.
    return view("comics/index", compact("comics")); 

}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("comics/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( StoreComicRequest $request)

    {    
        //Come richiamavo la funzione delle validazioni quando erano in fondo alla pagina
        // $this->validation($request->all());

        //come richiamo la funzione adesso
        $request->validated();


        // dd($request);
        $newComicElement = new Comic();

        //metto questa riga al posto delle 9 righe sotto
        $newComicElement->fill($request->all());

       /* $newComicElement->title = $request['title'];
        $newComicElement->description = $request['description'];
        $newComicElement->thumb = $request['thumb'];
        $newComicElement->price = $request['price'];
        $newComicElement->series = $request['series'];
        $newComicElement->sale_date = $request['sale_date'];
        $newComicElement->type = $request['type'];
        $newComicElement->artists = $request['artists'];
        $newComicElement->writers = $request['writers'];*/

        $newComicElement->save();

        return redirect()->route("comics.show", $newComicElement->id);
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
        
        //variabile creata sul momento, non centra on gli altri comic
        //salvare i dati nella variabile
        $comic = Comic::find($id);
        //dd($comic);

        return view("comics/show",compact("comic"));
     }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $comic = Comic::find($id);

       //andando in url "/comics/2/edit" vedrò ill dd sotto per il comic 2 ecc
        //dd($comic);

        return view("comics/edit", compact("comic"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreComicRequest $request, string $id)

    {
       
        //Come richiamavo la funzione delle validazioni quando erano in fondo alla pagina
        // $this->validation($request->all());
        
        //come richiamo la funzione adesso
        $request->validated();

 
        $newComicElement2 = Comic::find($id);

        //metto questa righa al posto delle 9 righe sotto 
        $newComicElement2->update($request->all());

       /* $newComicElement2->title = $request['title']; 
        $newComicElement2->description = $request['description'];
        $newComicElement2->thumb = $request['thumb'];
        $newComicElement2->price = $request['price'];
        $newComicElement2->series = $request['series'];
        $newComicElement2->sale_date = $request['sale_date'];
        $newComicElement2->type = $request['type'];
        $newComicElement2->artists = $request['artists'];
        $newComicElement2->writers = $request['writers'];*/

        $newComicElement2->save();

         //dd($newComicElement2 );

        return redirect()->route("comics.show", $newComicElement2->id);
    }



    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        //codice per modificare il comic dopo che abbiamo ricevuto i dati dal form legato a "edit" sopra


         //variabile creata sul momento, non centra on gli altri comic
        //salvare i dati nella variabile
        $comic = Comic::find($id);
        //dd($comic);


        $comic->delete();

        return redirect()->route("comics.index", $comic->id);
    }


//-------------------------------------------------------------------------
//DOVE STAVA IL CERVELLO DELLE VALIDAZIONI PRIMA DELL'OTTIMIZZAZIONE (OVVERO MESSO NEL FILE A SE)


}

