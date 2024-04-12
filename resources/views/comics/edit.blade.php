@extends("layouts/app")

@section("content")
  <div class="container py-5">
    <h1>PAGINA EDIT COMIC</h1>
     
    <!--ci restituisce il comic che abbiamo passato dal controller resources sezione edit-->
    @dump($comic)
    
    
       <!--inseriamo il nome della rotta verso "store"(presente nel ComicController insiem a "create" ecc) 
        che memorizza il dato creato dentro la variabile "request". La rotta si è trovata gurdando il terminale-->

        <!--indichiamo anche il metodo POST per la richesta-->
        <form action="{{ route('comics.store')}}" method="POST" >
              @csrf

            <div class="mb-3">
              <label for="title" class="form-label">Titolo Comic</label>
              <!--nella parte "value" voglio che a pagina fresca ci siano goia i voliri della 
                comic che voglio modificare cosi non devo riscrivere tutto-->
              <input type="text" class="form-control" id="title" name="title" value="{{$comic->title}}">
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione Comic</label>
                <!--nelle "textarea" e altri tag che hanno il tag di chiusura inserisco i dati cosi-->
                <textarea type="text" class="form-control" id="description" name="description">{{$comic->description}}</textarea>   
              </div>


              <div class="mb-3">
                <label for="thumb" class="form-label">Url immagime </label>
                <textarea type="text" class="form-control" id="thumb" name="thumb">{{$comic->thumb}}</textarea>   
              </div>
              
              <div class="mb-3">
                <label for="price" class="form-label">Prezzo Comic</label>
                <!--nella parte "value" voglio che a pagina fresca ci siano goia i voliri della 
                comic che voglio modificare cosi non devo riscrivere tutto-->
                <input type="text" class="form-control" id="price" name="price" value="{{$comic->price}}">
              </div>

              <div class="mb-3">
                <label for="series" class="form-label">Serie Comic</label>
                <input type="text" class="form-control" id="series" name="series" value="{{$comic->series}}">
              </div>

              <div class="mb-3">
                <label for="sell" class="form-label">Data Vendita Comic</label>
                <input type="date" class="form-control" id="sell" name="sell" value="{{$comic->sale_date}}">
              </div>

              <div class="mb-3">
                <label for="type" class="form-label">Tipo Comic</label>
                <input type="text" class="form-control" id="type" name="type" value="{{$comic->type}}">
              </div>

              <div class="mb-3">
                <label for="artists" class="form-label">Artisti del Comic</label>
                <input type="string" class="form-control" id="artists" name="artists" value="{{$comic->artists}}">
              </div>

              <div class="mb-3">
                <label for="writers" class="form-label">Scrittori del Comic</label>
                <input type="string" class="form-control" id="writers" name="writers" value="{{$comic->writers}}">
              </div>

              
           
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    
 
  </div>
@endsection