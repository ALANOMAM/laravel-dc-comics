<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)

    {    //Richiamiamo la funzione creata in fondo alla pagina che contiene le regole di validazioni
        //richiamando qui, lo vogliamo implementare allo store.
         $this->validation($request->all());

        // dd($request);
        $newComicElement = new Comic();

         
        $newComicElement->title = $request['title'];
        $newComicElement->description = $request['description'];
        $newComicElement->thumb = $request['thumb'];
        $newComicElement->price = $request['price'];
        $newComicElement->series = $request['series'];
        $newComicElement->sale_date = $request['sale_date']; /*qui c'era sell*/
        $newComicElement->type = $request['type'];
        $newComicElement->artists = $request['artists'];
        $newComicElement->writers = $request['writers'];

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
    public function update(Request $request, string $id)

    {
       //Anche qui richiamiamo la funzione creata in fondo alla pagina che contiene le regole di validazioni
        //richiamando qui, lo vogliamo implementare a update.
        $this->validation($request->all());


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
        $newComicElement2->sale_date = $request['sale_date'];
        $newComicElement2->type = $request['type'];
        $newComicElement2->artists = $request['artists'];
        $newComicElement2->writers = $request['writers'];

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
//DOVE STA IL CERVELLO DELLE VALIDAZIONI
// creiamo una funzione privata per i controlli di validazione e la comunicazione dei messaggi di errore
// che poi richiameremo per il metodo store e il metodo update
private function validation($data) {

    // quando facciamo l'import della  classe "Validator"  dobbiamo fare attenzione
    // ad importare quello presente in Support\Facades.
    $validator = Validator ::make($data, [
                'title'=>'required|max:100',
                'description' => 'nullable',
                'thumb' =>'nullable',
                'price' =>'required',
                'series' => 'required',
                'sale_date' => 'required',
                'type' => 'required|max:100',
                'artists' => 'required',
                'writers' => 'required',  
    ],
    [   //array che si occupa della traduzione degli errori, senza quello avrò errori solo in inglese.
        'title.required' => 'Il titolo deve essere inserito',
        'title.max' => "Il titolo deve avere massimo :max caratteri",
        'price.required' => 'Il prezzo deve essere inserito',
        'series.required' => 'La serie deve essere inserita',
        'sale_date.required' => 'La data di vendita deve essere inserita',
        'type.max' => "La tipologia deve avere massimo :max caratteri",
        'type.required' => 'La tipologia deve essere inserita',
        'artists.required' => 'Gli artisti devono essere inseriti',
        'writers.required' => 'Gli scrittori  devono essere inseriti',
        // 'max' => "Il campo :attribute deve avere massimo :max caratteri", // possiamo creare messaggi generali per regole condivise tra più campi
        // 'required' => "Il campo :attribute deve avere inserito", // possiamo creare messaggi generali per regole condivise tra più campi
    ])->validate();
     // tramite il metodo validate() controlliamo delle regole scelte da noi per i vari campi che riceviamo dal form
        // in caso le validazioni non vadano a buon fine (ne basta una sbagliata), laravel in automatico farà tornare l'utente indietro
        // e fornirà alla pagina precedente le indicazioni sull'errore
    }

}

