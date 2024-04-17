@extends('layouts.main')

@section('title','Cadastro - Cursos')

@section('subtitle', 'Cadastro de Curso')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{route('courses.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="formFile" class="form-label">Nome: </label>
            <input class="form-control" name="name" type="text" id="formFile" placeholder="Curso de Java">
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Descrição: </label>
            <input class="form-control" name="description" type="text" id="formFile" placeholder="Curso focado no aprendizado de...">
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Preço: </label>
            <input class="form-control" name="value" type="number" id="formFile" placeholder="500.00">
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Número máximo de incrições: </label>
            <input class="form-control" name="max_inscriptions" type="number" id="formFile" placeholder="200">
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Data de início de incrições: </label>
            <input class="form-control" name="start_inscriptions" type="date" id="formFile">
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Data de fim de incrições: </label>
            <input class="form-control" name="end_inscriptions" type="date" id="formFile">
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Material do curso: </label>
            <input class="form-control" name="material_file" type="file" id="formFile">
        </div>

        <div class="d-grid gap-2">
            <button class="btn btn-lg btn-success" type="submit">Cadastrar</button>
        </div>
    </form>
@endsection