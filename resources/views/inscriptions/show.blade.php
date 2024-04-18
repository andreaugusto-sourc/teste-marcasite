@extends('layouts.main')

@section('title', "Pagamento de inscrição")

@section('subtitle', 'Pague sua inscrição')

@section('content')

<h1 class="text-center">Gateway de pagamento não está funcionando!!!</h1>

<p class="lh-base alert alert-danger">Sinceramente, eu nunca fiz um sistema de gateway de pagamento, e infelizmente não pude entregar funcionando, tentei desenvolver um utilizando paypal, e não deu certo. Entretanto, tem um botão abaixo que simula que a inscrição foi paga, mudando o seu status, caso queira simular!</p>

<a class="btn btn-lg btn-primary mt-3 mb-3 w-100" href="{{route('inscriptions.pay', $inscription->id)}}">Pagar de mentirinha</a>

<h2 class="text-center">Tentativa falha com PayPal</h2>

<div class="row mt-3">
  <div class="col-12 col-lg-6 offset-lg-3">
    <div class="input-group">
      <span class="input-group-text">BRL</span>
      <input type="text"
             class="form-control"
             id="paypal-amount"
             value="10"
             aria-label="Amount (to the nearest pound)">
      <span class="input-group-text">.00</span>
    </div>
  </div>
</div>

<div class="row mt-3">
  <div class="col-12 col-lg-6 offset-lg-3" id="payment_options"></div>
</div>

<script>
    paypal.Buttons({
      createOrder: function () {
        return fetch("/create/" + document.getElementById("paypal-amount").value)
          .then((response) => response.text())
          .then((id) => {
            return id;
          });
      },
  
      onApprove: function () {
        return fetch("/complete", {method: "post", headers: {"X-CSRF-Token": '{{csrf_token()}}'}})
          .then((response) => response.json())
          .then((order_details) => {
            console.log(order_details);
            document.getElementById("paypal-success").style.display = 'block';
            //paypal_buttons.close();
          })
          .catch((error) => {
            console.log(error);
          });
      },
  
      onCancel: function (data) {
        //todo
      },
  
      onError: function (err) {
        //todo
        console.log(err);
      }
    }).render('#payment_options');
  </script>
@endsection