@extends('layouts.main')

@section('title', 'Index - Inscrições')

@section('subtitle', 'Minhas inscrições')

@section('content')
<section class="d-flex flex-wrap align-items-center justify-content-center">
    @foreach ($inscriptions as $inscription)
    <div class="card mb-3 ms-3 mr-3" style="width: 18rem;">
        <div class="card-body">
        <h5 class="card-title fw-bold">Inscrição #{{$inscription->code}}</h5>
          <p class="card-text">{{$inscription->course->name}}</p>
          <p class="card-text">{{$inscription->company}}</p>
          <p class="card-text">{{$inscription->category}}</p>
          <p class="card-text">Inscrito em {{date( 'd/m/Y' , strtotime($inscription->created_at))}}</p>
          <a href="{{route('inscriptions.show', $inscription->id)}}" class="btn btn-primary">Acessar</a>
        </div>
      </div>
    @endforeach
</section>
@endsection