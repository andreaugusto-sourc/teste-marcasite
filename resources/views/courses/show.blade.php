@extends('layouts.main')

@section('title', $course->name)

@section('subtitle', $course->name)

@section('content')
<div class="d-flex flex-column align-items-center fs-3 bg-white p-3 w-50 m-auto rounded">
    <p>{{$course->description}}</p>
    <p>Período de inscrição: {{date( 'd/m/Y' , strtotime($course->start_inscriptions))}} até {{date( 'd/m/Y' , strtotime($course->end_inscriptions))}}</p>
    <p>Número de inscrições: {{$number_inscriptions}}/{{$course->max_inscriptions}}</p>
    <p>Preço: R$ {{number_format($course->value, 2)}}</p>

    @if ($number_inscriptions >= $course->max_inscriptions)
        <a href="{{ route('courses.index') }}" class="btn btn-lg btn-danger">Voltar (Inscrições encerradas)</a>
    @else
        <a href="{{ route('inscriptions.create', $course->id) }}" class="btn btn-lg btn-primary">Inscreva-se</a>
    @endif
    
</div>

@endsection