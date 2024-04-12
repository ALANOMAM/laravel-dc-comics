@extends("layouts/app")

@section("content")
  <div class="container py-5">
    <h1>PAGINE SHOW</h1>
   <h2>{{$comic->title}}</h2>
   <img src="{{$comic->thumb}}" alt="">


   <!--pulsante di modifica-->
   <div class="py-5">
    <a href="{{route('comics.edit', $comic->id)}}" class="btn btn-warning">Modifica</a>
     

    <!--il moi pulsante per l'eliminazione deve essere dentro un mini form-->
<form action="{{route('comics.destroy', $comic->id)}}" method="POST">
  <!--serve questo commando -->
  @csrf
  <!--serve questo commando -->
  @method("DELETE")

  <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"> Elimina</button>

 </form>

  </div>






  </div>
@endsection