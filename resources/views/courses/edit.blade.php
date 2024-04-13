@extends('layouts.main')

@section('title', 'Edição - Cursos')

@section('subtitle', 'Editar Curso')

@section('content')
<form action="{{route('courses.update', $course->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="formFile" class="form-label">Nome: </label>
        <input class="form-control" name="name" value="{{$course->name}}" type="text" id="formFile" placeholder="Curso de Java">
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">Descrição: </label>
        <input class="form-control" name="description" value="{{$course->description}}" type="text" id="formFile" placeholder="Curso focado no aprendizado de...">
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">Preço: </label>
        <input class="form-control" name="value" value="{{$course->value}}" type="number" id="formFile" placeholder="500.00">
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">Número máximo de incrições: </label>
        <input class="form-control" name="max_inscriptions" value="{{$course->max_inscriptions}}" type="number" id="formFile" placeholder="200">
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">Data de início de incrições: </label>
        <input class="form-control" name="start_inscriptions" value="{{$course->start_inscriptions}}" type="date" id="formFile">
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">Data de fim de incrições: </label>
        <input class="form-control" name="end_inscriptions" value="{{$course->end_inscriptions}}" type="date" id="formFile">
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">Material do curso: </label>
        <input class="form-control" name="material_file" type="file" id="formFile">
    </div>

    <div class="d-grid gap-2">
        <button class="btn btn-lg btn-success" type="submit">Atualizar</button>
    </div>
</form>
@endsection