
@extends("layouts/app")

@section("content")
  <div class="container py-5">
    <h1>PAGINA CREAZIONE NUOVO COMIC</h1>
     
  
        <form action="{{ route('comics.store')}}" method="POST" >
              @csrf

            <div class="mb-3">
              <label for="title" class="form-label">Titolo Comic</label>
              <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione Comic</label>
                {{--il pezzo "{{old('description')}}" fa in modo tale che se inserisco un valore, anche se il form mi da error
                per colpa di quanche altro input che non rispetta le validazioni, questo input mi lascia il valore che avevo messo--}}
                <textarea type="text" class="form-control" id="description" name="description">{{old('description')}}</textarea>   
              </div>


              <div class="mb-3">
                <label for="thumb" class="form-label">Url immagime </label>
                <textarea type="text" class="form-control" id="thumb" name="thumb">{{old('thumb')}}</textarea>   
              </div>
              
              <div class="mb-3">
                <label for="price" class="form-label">Prezzo Comic</label>
                <input type="text" class="form-control" id="price" name="price" value="{{old('price')}}">
              </div>

              <div class="mb-3">
                <label for="series" class="form-label">Serie Comic</label>
                <input type="text" class="form-control" id="series" name="series" value="{{old('series')}}">
              </div>

              <div class="mb-3">
                <label for="sell" class="form-label">Data Vendita Comic</label>
                <input type="date" class="form-control" id="sell" name="sell" value="{{old('sell')}}">
              </div>

              <div class="mb-3">
                <label for="type" class="form-label">Tipo Comic</label>
                <input type="text" class="form-control" id="type" name="type" value="{{old('type')}}">
              </div>

              <div class="mb-3">
                <label for="artists" class="form-label">Artisti del Comic</label>
                <input type="string" class="form-control" id="artists" name="artists" value="{{old('artists')}}">
              </div>

              <div class="mb-3">
                <label for="writers" class="form-label">Scrittori del Comic</label>
                <input type="string" class="form-control" id="writers" name="writers" value="{{old('writers')}}">
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