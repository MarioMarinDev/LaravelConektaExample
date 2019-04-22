
@extends('layouts.main')

@push('scripts')
  <script type="text/javascript" src="https://cdn.conekta.io/js/latest/conekta.js"></script>
  <script type="text/javascript" src="{{ mix('/js/conekta_example/form.js') }}"></script>
@endpush

@section('main')
  <form id="card-form" action="{{ route('conekta_example.payment') }}" method="POST">
    @csrf
    <input type="hidden" id="conektaTokenId" name="conektaTokenId" value="">
    <div class="card">
      <div class="card-header">
        <div class="row display-tr">
          <h4>Online Payment</h4>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <label for="email">Email:</label>
            <input id="email" name="email" type="email" class="form-control">
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-md-6">
            <label for="name">Cardholder name:</label>
            <input id="name" data-conekta="card[name]" class="form-control"
            type="text" name="name">
          </div>
          <div class="col-md-6">
            <label for="card_number">Card number:</label>
            <input id="card_number" data-conekta="card[number]"
            class="form-control" type="number" value="4242424242424242">
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-md-6">
            <label for="cvc">CVC:</label>
            <input id="cvc" data-conekta="card[cvc]" class="form-control"
            type="number" value="399">
          </div>
          <div class="col-md-6">
            <label for="date">Expiration date:</label><br>
            <input id="date" value="11" data-conekta="card[exp_month]" class="form-control"
            style="width: 50px; display: inline-block;">
            <input value="20" data-conekta="card[exp_year]" class="form-control"
            style="width: 50px; display: inline-block;">
          </div>
        </div>
        <hr>
        <div class="row mt-4">
          <div class="col-md-12">
            <button id="btn_pay" type="button" class="btn btn-primary btn-lg">
              <i class="fa fa-check-square mr-2"></i>Pay
            </button>
            <button id="btn_submit" hidden></button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection
