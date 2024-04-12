@extends("layouts/app")

@section("content")
  <div class="container py-5">
    <h1>PAGINE SHOW</h1>
   <h2>{{$comic->title}}</h2>
   <img src="{{$comic->thumb}}" alt="">


   <!--pulsante di modifica-->
   <div class="py-5">
    <a href="{{route('comics.edit', $comic->id)}}" class="btn btn-warning">Modifica</a>

     <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Elimina
    </button>
</div>


  </div>
@endsection