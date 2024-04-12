@extends("layouts/app")

@section("content")
  <div class="container py-5 mb-5">
    <h1>PAGINA INDEX</h1>
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
        <!--è in questo punto che collego il file/vista "index" col file show tramite link-->
        <!--la rotta giù me la ricavo cercando sul terminale, e mi da appunto "comics.show"-->
        <td><a href="{{route('comics.show' , $comic->id )}}">visualizza comic</a></td>
       </tr>
        @endforeach
        
    </tbody>
  </table>

  <!--è in questo punto che collego il file index col file/vista "create" tramite link-->
<!--la rotta giù me la ricavo cercando sul terminale, e mi da appunto "comics.create"-->
  <a href="{{route('comics.create')}}" class="btn btn-primary">Aggiungi comic</a>
  </div>
@endsection