@extends('layouts.main')

@section('title', 'Edição - Inscrição')

@section('subtitle', 'Editar inscrição')

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
<form action="{{route('inscriptions.update', $inscription->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <select class="form-select" aria-label="Default select example" name="category">
            <option disabled>Escolha uma categoria para a inscrição</option>
            <option selected>{{$inscription->category}}</option>
            @foreach ($category_enums as $category_enum)
                @if ($category_enum->value != $inscription->category)
                    <option>{{$category_enum->value}}</option>
                @endif
            @endforeach
          </select>
    </div>

    <div class="mb-3">
        <select class="form-select" aria-label="Default select example" name="status">
            <option disabled>Escolha um status para a inscrição</option>
            <option selected>{{$inscription->status}}</option>
            @foreach ($status_enums as $status_enum)
                @if ($status_enum->value != $inscription->status)
                    <option>{{$status_enum->value}}</option>
                @endif
            @endforeach
          </select>
    </div>

    <div class="form-floating mb-3">
        <input type="email" name="email" value="{{$inscription->email}}" class="form-control" id="floatingInput" placeholder="andremartins@gmail.com">
        <label for="floatingInput">E-mail</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" name="address" value="{{$inscription->address}}" class="form-control" id="floatingInput" placeholder="Rua Bernando da Silva, 20, Vila Arruda">
        <label for="floatingInput">Endereço</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" name="company" value="{{$inscription->company}}" class="form-control" id="floatingInput" placeholder="Dexco">
        <label for="floatingInput">Empresa</label>
    </div>

    <div class="form-floating mb-3">
        <input type="number" name="phone" value="{{$inscription->phone}}" class="form-control" id="floatingInput" placeholder="15997610117">
        <label for="floatingInput">Número de celular</label>
    </div>

    <div class="form-floating mb-3">
        <input type="number" name="telephone" value="{{$inscription->telephone}}" class="form-control" id="floatingInput" placeholder="3272-2329">
        <label for="floatingInput">Número de telefone fixo</label>
    </div>

    <div class="form-floating mb-3">
        <input type="password" name="password" value="{{$inscription->password}}" class="form-control" id="floatingInput" placeholder="Rua Bernando da Silva, 20, Vila Arruda">
        <label for="floatingInput">Senha</label>
    </div>
   
    <div class="d-grid gap-2">
        <button class="btn btn-lg btn-success" type="submit">Atualizar</button>
    </div>
</form>
@endsection