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
    public function store(Request $request)
    {
        // dd($request);
        // qui facciamo una specie di seeder usando la variabile 
        //"request" che ha tutte le info sul mio nuovo comic e filtrando ogi info
        //per passarlo alla tabella.
        $newComicElement = new Comic();

         
        $newComicElement->title = $request['title'];  //o " $newComicElement->title = $request->title; "
        $newComicElement->description = $request['description'];
        $newComicElement->thumb = $request['thumb'];
        $newComicElement->price = $request['price'];
        $newComicElement->series = $request['series'];
        $newComicElement->sale_date = $request['sell'];
        $newComicElement->type = $request['type'];
        $newComicElement->artists = $request['artists'];
        $newComicElement->writers = $request['writers'];

        $newComicElement->save();

       //se dopo avere salvato il nuovo elemento vogliamo ridirezionarci nel show facendo vedere direttamente 
       //l'elemento aggiunto(per questo abbiamo il secondo parametro "$newComicElement->id")
       //senza quello, dopo che slavo il nuovo elemento mi rimarrà una pagina bianca
       //si aggiorna lo stesso il database ma è più carino cambiare pagina una volta inviato tutto
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
        //variabile creata sul momento, non centra on gli altri comic
       $comic = Comic::find($id);

       //andando in url "/comics/2/edit" vedrò ill dd sotto per il comic 2 ecc
        //dd($comic);

        return view("comics/edit", compact("comic"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //codice per modificare il comic dopo che abbiamo ricevuto i dati dal form legato a "edit" sopra

        // dd($request);
        // qui facciamo una specie di seeder usando la variabile 
        //"request" che ha tutte le info sul mio nuovo comic e lo paragona a quelli del vecchio
        //per fare le opurtune modifiche 
        $newComicElement2 = Comic::find($id);

         
        $newComicElement2->title = $request['title'];  //o " $newComicElement2->title = $request->title; "
        $newComicElement2->description = $request['description'];
        $newComicElement2->thumb = $request['thumb'];
        $newComicElement2->price = $request['price'];
        $newComicElement2->series = $request['series'];
        $newComicElement2->sale_date = $request['sell'];
        $newComicElement2->type = $request['type'];
        $newComicElement2->artists = $request['artists'];
        $newComicElement2->writers = $request['writers'];

        $newComicElement2->save();

         //dd($newComicElement2 );

       //se dopo avere salvato il nuovo elemento vogliamo ridirezionarci nel show facendo vedere direttamente 
       //l'elemento aggiunto(per questo abbiamo il secondo parametro "$newComicElement2->id")
       //senza quello, dopo che slavo il nuovo elemento mi rimarrà una pagina bianca
       //si aggiorna lo stesso il database ma è più carino cambiare pagina una volta inviato tutto
        return redirect()->route("comics.show", $newComicElement2->id);
    }



    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
