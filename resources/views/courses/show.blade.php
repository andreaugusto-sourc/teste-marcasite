@extends('layouts.main')

@section('title', $course->name)

@section('subtitle', $course->name)

@section('content')

<p>Descrição: {{$course->description}}</p>
<p>Preço: R$ {{$course->value}}</p>

@endsection