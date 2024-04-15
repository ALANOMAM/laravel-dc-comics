@extends("layouts/app")

@section("content")
  <div class="container py-5">
    <h1>PAGINA EDIT COMIC</h1>
     
    <!--ci restituisce il comic che abbiamo passato dal controller resources sezione edit-->
     {{-- @dump($comic) --}}
    
    
       <!--inseriamo il nome della rotta verso "update"(presente nel ComicController insiem a "create" ecc) 
        ed è li che avverà la modifica, quetso form riceve e manda solo le info. La rotta si è trovata gurdando il terminale-->

        <!--indichiamo anche il metodo POST per la richesta-->
        <form action="{{ route('comics.update', $comic->id)}}" method="POST" >

              @csrf
              {{--ci serve il mommando @method("PUT")--}}
              @method("PUT")

            <div class="mb-3">
              <label for="title" class="form-label">Titolo Comic</label>
              <!--nella parte "value" il pezzo scritto serve
              se inserisco un valore che va bene ma qualcosa va storto con un'altro input
              "se avevo inserito un nuovo valore lascia il nuovo valore inserito(dove l'uso di old), altrimenti 
              restituiscimi il valore dal database per quel comic o quella proprietà(dove l'uso di $comic->title )"-->
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title')??$comic->title}}">
              @error('title') 
              <div class="invalid-feedback">
               {{$message}} 
              </div>
              @enderror
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione Comic</label>
                <!--nelle "textarea" e altri tag che hanno il tag di chiusura inserisco i dati cosi-->
                <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{$comic->description}}</textarea>   
                @error('description') 
                <div class="invalid-feedback">
                 {{$message}} 
                </div>
                @enderror
              </div>


              <div class="mb-3">
                <label for="thumb" class="form-label">Url immagime </label>
                <textarea type="text" class="form-control @error('thumb') is-invalid @enderror" id="thumb" name="thumb">{{$comic->thumb}}</textarea>   
                @error('thumb') 
                <div class="invalid-feedback">
                 {{$message}} 
                </div>
                @enderror
              </div>
              
              <div class="mb-3">
                <label for="price" class="form-label">Prezzo Comic</label>
                <!--nella parte "value" voglio che a pagina fresca ci siano goia i voliri della 
                comic che voglio modificare cosi non devo riscrivere tutto-->
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{old('price')??$comic->price}}">
                @error('price') 
                <div class="invalid-feedback">
                 {{$message}} 
                </div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="series" class="form-label">Serie Comic</label>
                <input type="text" class="form-control @error('series') is-invalid @enderror" id="series" name="series" value="{{old('series')??$comic->series}}">
                @error('series') 
                <div class="invalid-feedback">
                 {{$message}} 
                </div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="sell" class="form-label">Data Vendita Comic</label>
                <input type="date" class="form-control @error('sell') is-invalid @enderror" id="sell" name="sell" value="{{old('sell')??$comic->sale_date}}">
                @error('sell') 
                <div class="invalid-feedback">
                 {{$message}} 
                </div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="type" class="form-label">Tipo Comic</label>
                <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" value="{{old('type')??$comic->type}}">
                @error('type') 
                <div class="invalid-feedback">
                 {{$message}} 
                </div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="artists" class="form-label">Artisti del Comic</label>
                <input type="string" class="form-control @error('artists') is-invalid @enderror" id="artists" name="artists" value="{{old('artists')??$comic->artists}}">
                @error('artists') 
                <div class="invalid-feedback">
                 {{$message}} 
                </div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="writers" class="form-label">Scrittori del Comic</label>
                <input type="string" class="form-control @error('writers') is-invalid @enderror" id="writers" name="writers" value="{{old('writers')??$comic->writers}}">
                @error('writers') 
                <div class="invalid-feedback">
                 {{$message}} 
                </div>
                @enderror
              </div>

               {{--metodo per inserire la lista di tutti gli erroro della nostra form create, 
                ovvero quelli che non superano la validazione impostata gia nel file controlli e sezione store
                non è tanto best practice in quanto di solito gli erori vengono inseriti sotto ogni input e non
                tutti alla fine ma può sevire--}}
                @if($errors->any())
                {{--la variabile "$errors" è gia inclusa, non l'ho creata io --}}
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif


           
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    
 
  </div>
@endsection