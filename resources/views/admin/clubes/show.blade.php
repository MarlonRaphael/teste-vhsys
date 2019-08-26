@extends('layouts.app')

@section('title', 'Detalhes do clube')

@section('content')
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-xl-12">
        <div class="card shadow">
          <div class="card-header bg-transparent">
            <div class="row align-items-center justify-content-between">
              <div class="col">
                <h2 class="mb-0">Detalhes do clube</h2>
              </div>
              <div class="col text-right">
                <a href="{{ route('clubes.index') }}" class="btn btn-danger btn-sm" role="button">
                  <i class="fas fa-long-arrow-alt-left"></i> Voltar
                </a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <table class="table">
              <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Apelido</th>
                <th scope="col">Escudo</th>
                <th scope="col">Mascote</th>
                <th scope="col">Estadio</th>
                <th scope="col">Fundacao</th>
                <th scope="col">Criado em</th>
                <th scope="col">Atualizado em</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <th scope="row">{{ $clube->id }}</th>
                <td>
                  <img src="{{ $clube->escudo_clube }}" alt="" class="rounded-circle" width="50" height="50">
                </td>
                <td>{{ $clube->nome }}</td>
                <td>{{ $clube->apelido }}</td>
                <td>{{ $clube->mascote }}</td>
                <td>{{ $clube->estadio }}</td>
                <td>{{ $clube->fundacao->format('d/m/Y') }} ({{ $clube->fundacao->age }}) anos.</td>
                <td>{{ $clube->created_at }}</td>
                <td>{{ $clube->updated_at }}</td>
              </tr>
              </tbody>
            </table>

            <hr class="my-3">

            <h3>Jogadores do clube</h3>

            <table class="table">
              <caption>Lista de jogadores</caption>
              <thead>
              <tr>
                <th scope="col">Foto</th>
                <th scope="col">Nome</th>
                <th scope="col">Apelido</th>
                <th scope="col">Data nascimento</th>
                <th scope="col">Altura</th>
                <th scope="col">Peso</th>
                <th scope="col">Pé</th>
                <th scope="col">Posição</th>
                <th scope="col">Nacionalidade</th>
              </tr>
              </thead>
              <tbody>
                @forelse($clube->jogadores as $jogador)
                    <tr>
                      <th scope="row">
                        <img src="{{ $jogador->avatar }}" alt="" class="rounded-circle" width="50" height="50">
                      </th>
                      <td>{{ $jogador->nome }}</td>
                      <td>{{ $jogador->apelido }}</td>
                      <td>{{ $jogador->dt_nascimento->format('d/m/Y') }}</td>
                      <td>{{ $jogador->altura }}</td>
                      <td>{{ $jogador->peso }}</td>
                      <td>{{ $jogador->pe }}</td>
                      <td>{{ $jogador->posicao }}</td>
                      <td>{{ $jogador->nacionalidade }}</td>
                    </tr>
                @empty
                  <p class="lead">
                    Este clube não possui nenhum jogador
                    <a href="{{ route('jogadores.index') }}">Clique para adicionar</a>
                  </p>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection