<td class="text-right">
  <div class="dropdown text-center">
    <a class="btn btn-sm btn-outline-dark" href="#" role="button"
       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-ellipsis-v"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
      <a class="dropdown-item" href="{{ route(request()->segment(2).".show", $item->id) }}">
        <i class="far fa-eye mr-2"></i> Ver
      </a>
      <a class="dropdown-item" href="{{ route(request()->segment(2).".edit", $item->id) }}">
        <i class="far fa-edit mr-2"></i> Editar
      </a>
      <form action="{{ route(request()->segment(2).".destroy", $item->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-link rounded-0 text-danger dropdown-item">
          <i class="fas fa-trash mr-2"></i> Excluir
        </button>
      </form>
    </div>
  </div>
</td>