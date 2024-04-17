@extends('layouts.main')

@section('title','Dashboard de Inscrições')

@section('subtitle', 'Lista/Edição de inscritos')

@section('content')

<table class="table">
  <thead>
    <tr>
      <th scope="col">Inscrito</th>
      <th scope="col">Data de inscrição</th>
      <th scope="col">Categoria</th>
      <th scope="col">CPF</th>
      <th scope="col">E-mail</th>
      <th scope="col">Status</th>
      <th scope="col">Total</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($inscriptions as $inscription)
        <tr>
        <td>{{$inscription->user->name}}</td>
        <td>{{$inscription->created_at}}</td>
        <td>{{$inscription->category}}</td>
        <td>{{$inscription->user->cpf}}</td>
        <td>{{$inscription->email}}</td>
        <td>Se ta pago ou não</td>
        <td>{{$inscription->value}}</td>
        <td>
        <form action="{{route('inscriptions.destroy', $inscription->id)}}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Deletar</button>
        </form>

        <button type="button" class="btn btn-primary"><a class="text-white text-decoration-none" href="{{route('inscriptions.edit',$inscription->id)}}">Editar</a></button>
        </td>
        </tr>
    @endforeach
  </tbody>
</table>

@endsection