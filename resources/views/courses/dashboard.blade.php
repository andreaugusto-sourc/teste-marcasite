@extends('layouts.main')

@section('title', 'Dashboard de Cursos')

@section('content')

<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header text-dark">
                <h1>Acompanhamento de Cursos</h1>
            </div>
            <div class="card-body">
                <a href="{{route('courses.create')}}" class="btn btn-success btn-lg">Adicionar Curso</a>
            </div>
        </div>
    </div>
</div>

@foreach ($courses as $course)

<div class="d-flex justify-content-around align-items-center m-5">

    <a class="w-25 text-decoration-underline fs-3" href="{{route('courses.show',$course->id)}}">{{$course->name}}</a>

    <a class="w-25 text-decoration-underline fs-3" href="{{route('inscriptions.dashboard',$course->id)}}">Inscrições</a>

    <form action="{{route('courses.destroy',$course->id)}}" method="post">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger fs-5">Deletar</button>
    </form>

    <button type="button" class="btn btn-primary fs-5"><a class="text-white text-decoration-none" href="{{route('courses.edit',$course->id)}}">Editar</a></button>
</div>

@endforeach
@endsection