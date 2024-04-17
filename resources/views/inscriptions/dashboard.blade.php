@extends('layouts.main')

@section('title', 'Dashboard de Inscrições')

@section('subtitle', 'Lista/Edição de inscritos')

@section('content')

    <div class="card mt-3 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <h3 class="fw-bold">Pesquisar</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('inscriptions.dashboard', $course_id) }}">
                <div class="row">

                    <div class="col-md-3 col-sm-12">
                        <label class="form-label" for="nome">Nome do Inscrito</label>
                        <input type="text" name="name" id="name" class="form-control"
                            placeholder="Nome do inscrito" />
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <label class="form-label" for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option selected disabled>Escolha um status</option>
                            <option>Cancelado</option>
                            <option>Aguardando pagamento</option>
                            <option>Pago</option>
                        </select>
                    </div>


                    <div class="col-md-3 col-sm-12">
                        <label class="form-label" for="category">Categoria</label>
                        <select name="category" id="category" class="form-control">
                            <option selected disabled>Escolha uma categoria de inscrição</option>
                            <option>Estudante</option>
                            <option>Profissional</option>
                            <option>Associado</option>
                        </select>
                    </div>

                    <div class="col-md-3 col-sm-12 mt-3 pt-4">
                        <button type="submit" class="btn btn-info btn">Pesquisar</button>
                        <a href="{{ route('inscriptions.dashboard', $course_id) }}" class="btn btn-warning btn">Limpar</a>
                    </div>

                </div>

            </form>
        </div>
    </div>

    <div class="card mt-3 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <h3 class="fw-bold">Listar Inscritos</h3>
            <a class="btn btn-success" href="{{ route('inscriptions.generate.pdf', $course_id) }}">Gerar PDF</a>
        </div>
        <div class="card-body">
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
                            <td>{{ $inscription->user->name }}</td>
                            <td>{{ date('d/m/Y', strtotime($inscription->created_at)) }}</td>
                            <td>{{ $inscription->category }}</td>
                            <td>{{ $inscription->user->cpf }}</td>
                            <td>{{ $inscription->email }}</td>
                            <td>{{ $inscription->status }}</td>
                            <td>R$ {{number_format($inscription->value, 2)}}</td>
                            <td class="d-flex gap-2">
                                <form action="{{ route('inscriptions.destroy', $inscription->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                                </form>

                                <button type="button" class="btn btn-primary btn-sm"><a
                                        class="text-white text-decoration-none"
                                        href="{{ route('inscriptions.edit', $inscription->id) }}">Editar</a></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
