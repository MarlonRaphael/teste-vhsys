@extends('layouts.app')

@section('title', 'Clubes')

@section('content')
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-xl-12">
        <div class="card shadow">
          <div class="card-header bg-transparent">
            <div class="row align-items-center justify-content-between">
              <div class="col">
                <h6 class="text-uppercase text-muted mb-1">Gerenciar</h6>
                <h2 class="mb-0">Clubes</h2>
              </div>
              <div class="col align-items-center d-sm-none d-md-flex d-lg-flex justify-content-end">
                <a class="btn btn-outline-success btn-sm" role="button" href="{{ route('clubes.create') }}">
                  <i class="fas fa-plus mr-2"></i> Adicionar
                </a>
                <a href="{{ route('admin') }}" class="btn btn-danger btn-sm ml-3" role="button">
                  <i class="fas fa-long-arrow-alt-left"></i> Voltar
                </a>
              </div>
            </div>
          </div>
          <div class="card-body">
            {!! $dataTable->table() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('footerScripts')
  {!! $dataTable->scripts() !!}
@endpush
