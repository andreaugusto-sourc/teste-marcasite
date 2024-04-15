@extends('layouts.main')

@section('title', 'Cadastro - Inscrição')

@section('subtitle', 'Inscreva-se no '.$course->name)

@section('content')

<form action="{{route('inscriptions.store')}}" method="post">
    @csrf

    <div class="mb-3">
        <select class="form-select" aria-label="Default select example" name="category">
            <option selected disabled>Escolha uma categoria de inscrição:</option>
            <option>Estudante</option>
            <option>Profissional</option>
            <option>Associado</option>
          </select>
    </div>

    <div class="form-floating mb-3">
        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="andremartins@gmail.com">
        <label for="floatingInput">E-mail</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" name="address" class="form-control" id="floatingInput" placeholder="Rua Bernando da Silva, 20, Vila Arruda">
        <label for="floatingInput">Endereço</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" name="company" class="form-control" id="floatingInput" placeholder="Dexco">
        <label for="floatingInput">Empresa</label>
    </div>

    <div class="form-floating mb-3">
        <input type="number" name="phone" class="form-control" id="floatingInput" placeholder="15997610117">
        <label for="floatingInput">Número de celular</label>
    </div>

    <div class="form-floating mb-3">
        <input type="number" name="telephone" class="form-control" id="floatingInput" placeholder="3272-2329">
        <label for="floatingInput">Número de telefone fixo</label>
    </div>

    <div class="form-floating mb-3">
        <input type="password" name="password" class="form-control" id="floatingInput" placeholder="Rua Bernando da Silva, 20, Vila Arruda">
        <label for="floatingInput">Senha</label>
    </div>
   
    <div class="d-grid gap-2">
        <button class="btn btn-lg btn-success" type="submit">Cadastrar</button>
    </div>
</form>
@endsection