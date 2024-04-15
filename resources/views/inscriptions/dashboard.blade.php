@extends('layouts.main')

@section('title','Dashboard de Inscrições')

@section('content')

@foreach ($inscriptions as $inscription)

<div class="d-flex justify-content-around align-items-center m-5">


    <form action="{{route('inscriptions.destroy',$inscription->id)}}" method="post">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger fs-5">Deletar</button>
    </form>

    <button type="button" class="btn btn-primary fs-5"><a class="text-white text-decoration-none" href="{{route('inscriptions.edit',$inscription->id)}}">Editar</a></button>
</div>

@endforeach

@endsection