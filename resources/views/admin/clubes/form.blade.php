@extends('layouts.app')

@section('title', isset($clube) ? 'Editar clube' : 'Adicionar clube')

@section('content')
  <div class="container my-5">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <div class="row justify-content-center">
      <div class="col-xl-12">
        <div class="card shadow">
          <div class="card-header bg-transparent">
            <div class="row align-items-center justify-content-between">
              <div class="col">
                <h2 class="mb-0">Novo clube</h2>
              </div>
              <div class="col text-right">
                <a href="{{ route('clubes.index') }}" class="btn btn-danger btn-sm" role="button">
                  <i class="fas fa-long-arrow-alt-left"></i> Voltar
                </a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form action="{{ $action }}"
                  method="post" enctype="multipart/form-data">
              @csrf
              {{ isset($clube) ? method_field('PUT') : '' }}
              <div class="form-row">
                <div class="col-xl-12 col-md-12 col-sm-12">
                  <div class="form-group @error('escudo') has-danger @enderror m-3">
                    <label for="Escudo" class="text-center" style="cursor: pointer;">
                      {!! isset($clube->escudo_clube)
                        ? '<img src="'.$clube->escudo_clube.'" alt="" height="100" width="100" class="img-thumbnail"><br><small class="text-muted">Alterar avatar</small>'
                        : '<i class="fas fa-futbol fa-5x"></i><br><small class="text-muted">Selecione o avatar</small>'
                      !!}
                    </label>
                    <input type="file" id="Escudo" class="invisible @error('escudo') is-invalid @enderror"
                           name="escudo" value="{{ old('escudo') }}">
                    @error('escudo')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-xl-6 col-md-6 col-sm-12">
                  <div class="form-group @error('nome') has-danger @enderror">
                    <label for="Nome">Nome</label>
                    <input type="text" id="Nome" class="form-control @error('nome') is-invalid @enderror"
                           name="nome" value="{{ $clube->nome ?? old('nome') }}" placeholder="Digite o nome do time *">
                    @error('nome')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12">
                  <div class="form-group @error('apelido') has-danger @enderror">
                    <label for="Apelido">Apelido</label>
                    <input type="text" id="Apelido" class="form-control @error('apelido') is-invalid @enderror"
                           name="apelido" value="{{ $clube->apelido ?? old('apelido') }}" placeholder="Digite o apelido do time *">
                    @error('apelido')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-xl-6 col-md-6 col-sm-12">
                  <div class="form-group @error('mascote') has-danger @enderror">
                    <label for="Mascote">Mascote</label>
                    <input type="text" id="Mascote" class="form-control @error('mascote') is-invalid @enderror"
                           name="mascote" value="{{ $clube->mascote ?? old('mascote') }}" placeholder="Digite o mascote do time *">
                    @error('mascote')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12">
                  <div class="form-group @error('fundacao') has-danger @enderror">
                    <label for="Fundacao">
                      Fundação do clube
                    </label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-clock"></i>
                          </span>
                      </div>
                      <input class="form-control @error('fundacao') is-invalid @enderror datepicker"
                             placeholder="Data de fundação" type="date" name="fundacao"
                             id="Fundacao" value="{{ isset($clube->fundacao) ? $clube->fundacao->format('Y-m-d') : old('fundacao') }}">
                      @error('fundacao')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-xl-6 col-md-6 col-sm-12">
                  <div class="form-group @error('estadio') has-danger @enderror">
                    <label for="Estadio">Estádio</label>
                    <input type="text" id="Estadio" class="form-control @error('estadio') is-invalid @enderror"
                           name="estadio" value="{{ $clube->estadio ?? old('estadio') }}" placeholder="Digite o nome do estádio *">
                    @error('estadio')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="btn-group">
                <button type="submit" class="btn btn-primary btn-sm">
                  <i class="far fa-thumbs-up"></i> {{ isset($clube) ? 'Atualizar' : 'Cadastrar' }}
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection