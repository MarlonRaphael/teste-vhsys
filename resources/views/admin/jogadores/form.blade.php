@extends('layouts.app')

@section('title', isset($jogador) ? 'Editar jogador' : 'Adicionar jogador')

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
                <h2 class="mb-0">Novo jogador</h2>
              </div>
              <div class="col text-right">
                <a href="{{ route('jogadores.index') }}" class="btn btn-danger btn-sm" role="button">
                  <i class="fas fa-long-arrow-alt-left"></i> Voltar
                </a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form action="{{ $action }}" method="post" enctype="multipart/form-data">
              @csrf
              {{ isset($jogador) ? method_field('PUT') : '' }}
              <div class="form-row">
                <div class="col-xl-12 col-md-12 col-sm-12">
                  <div class="form-group @error('avatar') has-danger @enderror m-3">
                    <label for="Avatar" class="text-center" style="cursor: pointer;">
                      {!! isset($jogador->avatar)
                        ? '<img src="'.$jogador->avatar.'" alt="" height="100" width="100" class="img-thumbnail"><br><small class="text-muted">Alterar avatar</small>'
                        : '<i class="fas fa-futbol fa-5x"></i><br><small class="text-muted">Selecione o avatar</small>'
                      !!}
                    </label>
                    <input type="file" id="Avatar" class="invisible @error('avatar') is-invalid @enderror"
                           name="avatar" value="{{ old('avatar') }}" required>
                    @error('avatar')
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
                           name="nome" value="{{ $jogador->nome ?? old('nome') }}"
                           placeholder="Digite o nome do jogador *" required>
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
                           name="apelido" value="{{ $jogador->apelido ?? old('apelido') }}"
                           placeholder="Digite o apelido do jogador *" required>
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
                  <div class="form-group @error('altura') has-danger @enderror">
                    <label for="Altura">Altura</label>
                    <input type="number" min="1.00" max="3.00" step="0.01" id="Altura"
                           class="form-control @error('altura') is-invalid @enderror"
                           name="altura" value="{{ $jogador->altura ?? old('altura') }}"
                           placeholder="Digite a altura do jogador *" required>
                    @error('altura')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12">
                  <div class="form-group @error('peso') has-danger @enderror">
                    <label for="Peso">Peso</label>
                    <input type="number" min="1.00" max="100.00" step="0.01" id="Peso"
                           class="form-control @error('peso') is-invalid @enderror"
                           name="peso" value="{{ $jogador->peso ?? old('peso') }}"
                           placeholder="Digite o peso do jogador *" required>
                    @error('peso')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-xl-6 col-md-6 col-sm-12">
                  <div class="form-group @error('pe') has-danger @enderror">
                    <label for="Pe">Pé</label>
                    <select name="pe" id="Pe" class="form-control @error('pe') is-invalid @enderror" required>
                      <option value="" disabled="disabled" selected>
                        Selecione o pé do jogador
                      </option>
                      <option value="destro" {{ isset($jogador->pe) && $jogador->pe === 'destro' ? 'selected' : '' }}>
                        Destro
                      </option>
                      <option value="canhoto" {{ isset($jogador->pe) && $jogador->pe === 'canhoto' ? 'selected' : '' }}>
                        Canhoto
                      </option>
                    </select>
                    @error('pe')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12">
                  <div class="form-group @error('posicao') has-danger @enderror">
                    <label for="Posicao">Posição</label>
                    <input type="text" id="Posicao" class="form-control @error('posicao') is-invalid @enderror"
                           name="posicao" value="{{ $jogador->posicao ?? old('posicao') }}" required
                           placeholder="Digite a posição do jogador *">
                    @error('posicao')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-xl-6 col-md-6 col-sm-12">
                  <div class="form-group @error('dt_nascimento') has-danger @enderror">
                    <label for="Nascimento">
                      Data de nascimento
                    </label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-clock"></i>
                          </span>
                      </div>
                      <input class="form-control @error('dt_nascimento') is-invalid @enderror datepicker"
                             placeholder="Data de nascimento" type="date" name="dt_nascimento" required
                             id="Nascimento" value="{{ isset($jogador) ? $jogador->dt_nascimento->format('Y-m-d') : old('dt_nascimento') }}">
                      @error('dt_nascimento')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12">
                  <div class="form-group @error('clube_id') has-danger @enderror">
                    <label for="Clube">Clube</label>
                    <select name="clube_id" id="Clube" class="form-control @error('clube_id') is-invalid @enderror" required>
                      <option value="" disabled="disabled" selected>
                        Selecione um clube para jogador
                      </option>
                      @forelse($clubes as $clube)
                        <option value="{{ $jogador->clube->id ?? old('clube_id') ?? $clube->id }}"
                                {{ isset($jogador->clube->id) && $jogador->clube->id === $clube->id ? 'selected' : '' }}>
                          {{ $jogador->clube->nome ?? $clube->nome }}
                        </option>
                      @empty
                        <option value="" disabled="disabled">
                          Nenhum clube cadastrado
                        </option>
                      @endforelse
                    </select>
                    @error('clube_id')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-xl-6 col-md-6 col-sm-12">
                  <div class="form-group @error('camisa') has-danger @enderror">
                    <label for="Camisa">Camisa</label>
                    <input type="number" id="Camisa" class="form-control @error('camisa') is-invalid @enderror"
                           name="camisa" value="{{ $jogador->camisa ?? old('camisa') }}"
                           placeholder="Digite o número da camisa do jogador *" required>
                    @error('camisa')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12">
                  <div class="form-group @error('nacionalidade') has-danger @enderror">
                    <label for="Nacionalidade">Nacionalidade</label>
                    <select name="nacionalidade" id="Nacionalidade" required
                            class="form-control @error('nacionalidade') is-invalid @enderror">
                    </select>
                    @error('nacionalidade')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="btn-group">
                <button type="submit" class="btn btn-primary btn-sm">
                  <i class="far fa-thumbs-up"></i> {{ isset($jogador) ? 'Atualizar' : 'Cadastrar' }}
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('footerScripts')
  <script>
      $(document).ready(function () {

          $.ajax({
              type: "get",
              url: "{{ asset('js/paises.json') }}",
              data: {empresa: $("#Nacionalidade").val()},
              dataType: 'json',
              contentType: "application/json; charset=utf-8",
              success: function (data) {
                  if (data != null) {
                      var selectbox = $('#Nacionalidade');
                      selectbox.find('option').remove();
                      selectbox.append('<option value="" disabled="disabled" selected="selected">Selecione a nacionalidade do jogador</option>');
                      $.each(data, function (key, value) {
                          if (value.gentilico === "{{ $jogador->nacionalidade ?? '' }}") {
                              selectbox.append('<option value=' + value.gentilico + ' selected="selected">' + value.nome_pais + ' (' + value.nome_pais_int + ')</option>');
                          } else {
                              selectbox.append('<option value=' + value.gentilico + '>' + value.nome_pais + ' (' + value.nome_pais_int + ')</option>');
                          }
                      });
                  }
              }
          });
      });
  </script>
@endpush