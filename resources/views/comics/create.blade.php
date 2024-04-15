
@extends("layouts/app")

@section("content")
  <div class="container py-5">
    <h1>PAGINA CREAZIONE NUOVO COMIC</h1>
     
  
        <form action="{{ route('comics.store')}}" method="POST" >
              @csrf

            <div class="mb-3">
              <label for="title" class="form-label">Titolo Comic</label>

              <input type="text" 
              class="form-control @error('title') is-invalid @enderror" 
              {{-- il pezzo "@error('title') is-invalid @enderror" aggiunge la classe "is-invalid"
              al mio input tag nel caso di errore, e questa classe in bootstrap rende i bordi del mio tag rosse
              per evidenziare che c'e un errore. Quindi se le mie validazioni non venogono soddisfatte per questo tag
              diventerà rosso per segnalare la zona problemmatica--}}
              id="title"
              name="title" 
               value="{{old('title')}}">
               {{--questo pezzo invece ci scive il messaggio dell'errore sotto il tag (anche qui "$message" non l'ho creato io )--}}
               @error('title') 
               <div class="invalid-feedback">
                {{$message}} 
               </div>
               @enderror
              {{--questo pezzo invece ci scive il messaggio dell'errore sotto il tag--}}
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione Comic</label>
                {{--il pezzo "{{old('description')}}" fa in modo tale che se inserisco un valore, anche se il form mi da error
                per colpa di quanche altro input che non rispetta le validazioni, questo input mi lascia il valore che avevo messo--}}
                <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{old('description')}}</textarea>  
              </div>


              <div class="mb-3">
                <label for="thumb" class="form-label">Url immagime </label>
                <textarea type="text" class="form-control @error('thumb') is-invalid @enderror" id="thumb" name="thumb">{{old('thumb')}}</textarea>   
              </div>
              
              <div class="mb-3">
                <label for="price" class="form-label">Prezzo Comic</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{old('price')}}">
                @error('price') 
               <div class="invalid-feedback">
                {{$message}} 
               </div>
               @enderror
              </div>

              <div class="mb-3">
                <label for="series" class="form-label">Serie Comic</label>
                <input type="text" class="form-control @error('series') is-invalid @enderror" id="series" name="series" value="{{old('series')}}">
                @error('series') 
                <div class="invalid-feedback">
                 {{$message}} 
                </div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="sale_date" class="form-label">Data Vendita Comic</label>
                <input type="date" class="form-control @error('sale_date') is-invalid @enderror" id="sale_date" name="sale_date" value="{{old('sale_date')}}">
                @error('sale_date') 
                <div class="invalid-feedback">
                 {{$message}} 
                </div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="type" class="form-label">Tipo Comic</label>
                <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" value="{{old('type')}}">
                @error('type') 
                <div class="invalid-feedback">
                 {{$message}} 
                </div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="artists" class="form-label">Artisti del Comic</label>
                <input type="string" class="form-control @error('artists') is-invalid @enderror" id="artists" name="artists" value="{{old('artists')}}">
                @error('artists') 
                <div class="invalid-feedback">
                 {{$message}} 
                </div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="writers" class="form-label">Scrittori del Comic</label>
                <input type="string" class="form-control @error('writers') is-invalid @enderror" id="writers" name="writers" value="{{old('writers')}}">
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