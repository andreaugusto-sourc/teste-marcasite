@extends('layouts.main')

@section('title','Index - Cursos')

@section('subtitle', 'Cursos disponíveis')

@section('content')
    <section class="d-flex flex-wrap align-items-center justify-content-center">
        @if(count($courses) == 0)
        <h1>Sem cursos!</h1>
        @else
        @foreach ($courses as $course)
            <div class="card mb-3 ms-3 mr-3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $course->name }}</h5>
                    <p class="card-text">{{ $course->description }}</p>
                    <a href="{{ route('courses.show', $course->id) }}" class="btn btn-primary">Quero saber mais</a>
                </div>
            </div>
        @endforeach
        @endif
    </section>
@endsection