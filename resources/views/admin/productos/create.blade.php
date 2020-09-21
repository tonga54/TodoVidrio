@extends('admin.layout.master')
@section('page_title')
  Alta producto
@stop
@section('content')

  <form role="form" action="{{ route('productos.store') }}" enctype="multipart/form-data" method="POST">
    @csrf

    <div class="row">
      <div class="col-sm-6">
        <!-- text input -->
        <div class="form-group">
          <label>Titulo</label>
          <input type="text" name="titulo" class="form-control @if($errors->productos->has('titulo'))is-invalid @endif" placeholder="Titulo ..." value="{{old('titulo')}}">
          @foreach ($errors->productos->get('titulo') as $message)
            <span class="error invalid-feedback">{{ $message}}</span>
          @endforeach
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <!-- textarea -->
        <div class="form-group">
          <label>Descripcion</label>
          <textarea name="descripcion" class="form-control @if($errors->productos->has('descripcion'))is-invalid @endif" rows="3" placeholder="Descripcion ..." value="{{old('descripcion')}}"></textarea>
          @foreach ($errors->productos->get('descripcion') as $message)
            <span class="error invalid-feedback">{{ $message}}</span>
          @endforeach
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Selecciona las imagenes</label>
          <div class="custom-file">
            <input type="file" name="imagenes[]" multiple class="custom-file-input form-control @if($errors->productos->has('imagenes'))is-invalid @endif" id="customFile">
            <label class="custom-file-label" for="customFile">Seleccione</label>
            @foreach ($errors->productos->get('imagenes') as $message)
              <span class="error invalid-feedback">{{ $message}}</span>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="" class="col-md-12">Activo</label>
          <input type="checkbox" name="activo" value="1" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
        </div>
      </div>
    </div>
    <div class="row">
      <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
  </form>
@stop
@section('scripts')
<script>
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
  $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
  });
</script>
@stop