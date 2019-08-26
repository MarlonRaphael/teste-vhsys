@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

{{--@alert(['type' => 'success', 'title' => 'Sucesso! -'])--}}
{{--@slot('message')--}}
{{--  Teste de registro de componentes--}}
{{--@endslot--}}
{{--@endalert--}}

{{--@error('title')--}}
{{--<div class="alert alert-danger">{{ $message }}</div>--}}
{{--@enderror--}}

{{--<example-component :some-prop='@json($array)'></example-component>--}}

{{--@isset($records)--}}
{{--  // $records is defined and is not null...--}}
{{--@endisset--}}

{{--@empty($records)--}}
{{--  // $records is "empty"...--}}
{{--@endempty--}}

{{--Carregar scripts primeiro--}}
{{--@prepend('scripts')--}}
{{--This will be first...--}}
{{--@endprepend--}}