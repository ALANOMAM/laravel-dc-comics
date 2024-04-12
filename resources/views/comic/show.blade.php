@extends("layouts/app")

@section("content")
  <div class="container py-5">
    <h1>PAGINE SHOW</h1>
   <h2>{{$comic->title}}</h2>
   <img src="{{$comic->thumb}}" alt="">

 


  </div>
@endsection