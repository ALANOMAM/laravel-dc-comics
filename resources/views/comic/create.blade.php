
@extends("layouts/app")

@section("content")
  <div class="container py-5">
    <h1>PAGINA CREAZIONE NUOVO COMIC</h1>
     
    <!--inserirò i dati che mi servono per creare un nuovo comic-->
    

        <form action="">

            <div class="mb-3">
              <label for="title" class="form-label">Titolo Comic</label>
              <input type="text" class="form-control" id="title" name="title">
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione Comic</label>
                <textarea type="text" class="form-control" id="description" name="description">
                </textarea>   
              </div>


              <div class="mb-3">
                <label for="thumb" class="form-label">Url immagime </label>
                <textarea type="text" class="form-control" id="thumb" name="thumb">
                </textarea>   
              </div>
              
              <div class="mb-3">
                <label for="price" class="form-label">Prezzo Comic</label>
                <input type="text" class="form-control" id="price" name="price">
              </div>

              <div class="mb-3">
                <label for="series" class="form-label">Serie Comic</label>
                <input type="text" class="form-control" id="series" name="series">
              </div>

              <div class="mb-3">
                <label for="sell" class="form-label">Data Vendita Comic</label>
                <input type="date" class="form-control" id="sell" name="sell">
              </div>

              <div class="mb-3">
                <label for="type" class="form-label">Tipo Comic</label>
                <input type="text" class="form-control" id="type" name="type">
              </div>

              <div class="mb-3">
                <label for="artists" class="form-label">Artisti del Comic</label>
                <input type="text" class="form-control" id="artists" name="artists">
              </div>

              <div class="mb-3">
                <label for="writers" class="form-label">Scrittori del Comic</label>
                <input type="text" class="form-control" id="writers" name="writers">
              </div>

              
           
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    
 
  </div>
@endsection