@extends('layouts.main')

@section('title', 'Index - Inscrições')

@section('subtitle', 'Minhas inscrições')

@section('content')
<section class="d-flex flex-wrap align-items-center justify-content-center">
    @if (count($inscriptions) == 0)
      <h1>Você não possui inscrições!</h1>
    @else
    @foreach ($inscriptions as $inscription)
    <div class="card mb-3 ms-3 mr-3" style="width: 18rem;">
        <div class="card-body">
        <h5 class="card-title fw-bold">Inscrição #{{$inscription->code}}</h5>
          <p class="card-text">{{$inscription->course->name}}</p>
          <p class="card-text">Empresa: {{$inscription->company}}</p>
          <p class="card-text">Categoria: {{$inscription->category}}</p>
          <p class="card-text">Inscrito em {{date( 'd/m/Y' , strtotime($inscription->created_at))}}</p>
          <p class="card-text">Status: {{$inscription->status}}</p>
          <p class="card-text">Valor: R$ {{number_format($inscription->value, 2)}}</p>
          @if ($inscription->status == "Aguardando pagamento")
          <a href="{{route('inscriptions.show', $inscription->id)}}" class="btn btn-primary">Pagar</a>
          <a href="{{route('inscriptions.cancel', $inscription->id)}}" class="btn btn-danger">Cancelar</a>
          @endif
        </div>
      </div>
    @endforeach
    @endif
</section>
@endsection