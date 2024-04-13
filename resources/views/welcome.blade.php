@extends('layouts.main')

@section('title', 'Welcome')

@section('content')

<h1>Welcome</h1>

<a href="{{route('courses.index')}}">Cursos</a>
<a href="{{route('inscriptions.index')}}">Minhas inscrições</a>

@endsection