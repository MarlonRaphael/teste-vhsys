@extends('layouts.app')

@section('title', 'Detalhes do jogador')

@section('content')
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-xl-12">
        <div class="card shadow">
          <div class="card-header bg-transparent">
            <div class="row align-items-center justify-content-between">
              <div class="col">
                <h2 class="mb-0">Detalhes do jogador</h2>
              </div>
              <div class="col text-right">
                <a href="{{ route('jogadores.index') }}" class="btn btn-danger btn-sm" role="button">
                  <i class="fas fa-long-arrow-alt-left"></i> Voltar
                </a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <table class="table">
              <tbody>
              <tr>
                <th scope="row">Foto</th>
                <td>
                  <img src="{{ $jogador->avatar }}" alt="" class="rounded-circle" width="80" height="80">
                </td>
              </tr>
              <tr>
                <th scope="row">Nome</th>
                <td>{{ $jogador->nome }}</td>
              </tr>
              <tr>
                <th scope="row">Apelido</th>
                <td>{{ $jogador->apelido }}</td>
              </tr>
              <tr>
                <th scope="row">Data de nascimento</th>
                <td>{{ $jogador->dt_nascimento->format('d/m/Y') }} <strong>({{ $jogador->dt_nascimento->age }}) anos</strong></td>
              </tr>
              <tr>
                <th scope="row">Altura</th>
                <td>{{ $jogador->altura }}</td>
              </tr>
              <tr>
                <th scope="row">Peso</th>
                <td>{{ $jogador->peso }}</td>
              </tr>
              <tr>
                <th scope="row">Pé</th>
                <td>{{ $jogador->pe }}</td>
              </tr>
              <tr>
                <th scope="row">Nacionalidade</th>
                <td>{{ $jogador->nacionalidade }}</td>
              </tr>
              <tr>
                <th scope="row">Clube</th>
                <td>{{ $jogador->clube->nome }}</td>
              </tr>
              <tr>
                <th scope="row">Criado em</th>
                <td>{{ $jogador->created_at }}</td>
              </tr>
              <tr>
                <th scope="row">Atualizado em</th>
                <td>{{ $jogador->updated_at }}</td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection