@extends('layouts.main')

@section('title', 'Welcome')

@section('subtitle', 'Bem-vindo, '.Auth::user()->name)

@section('content')

<section class="d-flex justify-content-center flex-wrap">
    <a href="{{route('courses.index')}}" class="text-dark">
        <div class="card" style="width: 28rem;">
            <img src="https://cdn-icons-png.flaticon.com/512/2299/2299499.png" class="card-img-top" alt="Imagem de curso">
            <div class="card-body">
              <h3 class="card-title">Cursos disponíveis</h3>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
    </a>
    
    <a href="{{route('inscriptions.index')}}" class="text-dark">
        <div class="card ms-5" style="width: 28rem;">
            <img src="https://cdn-icons-png.flaticon.com/512/4052/4052421.png" class="card-img-top" alt="Imagem de inscrição">
            <div class="card-body">
              <h3 class="card-title">Minhas inscrições</h3>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
    </a>
</section>

@endsection