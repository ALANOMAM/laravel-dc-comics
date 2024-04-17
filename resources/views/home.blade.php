@extends("layouts/app")

@section("content")
 <div class="container py-5">

  <h1 class="mb-4">HOME PAGE</h1>
  <p class="mb-3">Benvenuto sul nostro sito dei comics clicca cotto per avere accesso alle nostre proposte</p>
<a href="{{route('comics.index')}}" class="btn btn-primary">Guarda tutti i nostri comics</a>

 </div>

@endsection