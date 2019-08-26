@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-4">
        <a href="{{ route('clubes.index') }}">
          <div class="card text-white bg-secondary mb-3 card-effect" style="max-width: 18rem;">
            <div class="card-body">
              <h5 class="card-title text-center font-weight-bold">
                CLUBES
              </h5>
              <p class="text-center">
                <i class="fas fa-futbol fa-6x"></i>
              </p>
              <p class="card-text text-center">
                Gerenciar clubes
              </p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-4">
        <a href="{{ route('jogadores.index') }}">
          <div class="card text-white bg-dark mb-3 card-effect" style="max-width: 18rem;">
            <div class="card-body">
              <h5 class="card-title text-center font-weight-bold">
                JOGADORES
              </h5>
              <p class="text-center">
                <i class="fas fa-running fa-6x"></i>
              </p>
              <p class="card-text text-center">
                Gerenciar jogadores
              </p>
            </div>
          </div>
        </a>
      </div>
    </div>
</div>
@endsection
