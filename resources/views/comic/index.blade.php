@extends("layouts/app")

@section("content")
  <div class="container py-5">
   <h2>lista dei comics</h2>

   @dump($comics)

   <!-- in questa pagina visualizzo tutti i nomi dei comics in una tabella -->
   <table class="table">
    <thead>
      <tr>
        <th scope="col">Titolo</th>
        <th scope="col"></th>
      </tr>
    </thead>

    <tbody>
       
        @foreach ($comics as $comic)
        <tr>
        <td>{{$comic->title}}</td>
        <td><a href="#">visualizza comic</a></td>
       </tr>
        @endforeach
        
    </tbody>
  </table>

  </div>
@endsection