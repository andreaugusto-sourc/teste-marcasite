@extends('layouts.main')

@section('title','Index - Cursos')

@section('subtitle', 'Cursos disponíveis')

@section('content')
    <section class="d-flex flex-wrap align-items-center justify-content-center">
        @foreach ($courses as $course)
        <div class="card mb-3 ms-3 mr-3" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">{{$course->name}}</h5>
              <p class="card-text">{{$course->description}}</p>
              <a href="{{route('courses.show', $course->id)}}" class="btn btn-primary">Acessar</a>
            </div>
          </div>
        @endforeach
    </section>
@endsection