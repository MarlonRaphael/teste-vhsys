@if(!empty(old('name')))
  <div class="col-xl-12">
    <div class="alert alert-success alert-dismissible border border-light fade show" role="alert">
        <span class="alert-inner--icon">
          <i class="ni ni-like-2"></i>
        </span>
      <span class="alert-inner--text">
          <strong>Sucesso!</strong> Usuário <em class="border-bottom">{{ old('name') }}</em> cadastrado com sucesso!
        </span>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
@endif