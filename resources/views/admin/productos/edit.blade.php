@extends('admin.layout.master')
@section('page_title')
  Alta producto
@stop
@section('content')

  <form role="form" action="{{ route('productos.update', $producto->id) }}" enctype="multipart/form-data" method="POST">
    @csrf

    <div class="row">
      <div class="col-sm-6">
        <!-- text input -->
        <div class="form-group">
          <label>Titulo</label>
          <input type="text" name="titulo" class="form-control @if($errors->productos->has('titulo'))is-invalid @endif" placeholder="Titulo ..." value="{{$producto->titulo}}">
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
          <textarea name="descripcion" class="form-control @if($errors->productos->has('descripcion'))is-invalid @endif" rows="3" placeholder="Descripcion ..." value="{{$producto->descripcion}}">{{$producto->descripcion}}</textarea>
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
          <!-- custom-file-input  -->
            <input type="file" name="imagenes[]" multiple value="{{old('imagenes')}} class="custom-file-input form-control @if($errors->productos->has('imagenes'))is-invalid @endif" id="customFile">
            <label class="custom-file-label" for="customFile" style="overflow: hidden;">Seleccione</label>
            @foreach ($errors->productos->get('imagenes') as $message)
              <span class="error invalid-feedback">{{ $message}}</span>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="row" id="visor_imagenes">
      <img src="" id="blah" alt="">
    </div>
    <hr>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="" class="col-md-12">Activo</label>
          <input type="checkbox" name="activo" value="{{$producto->activo}}" @if ($producto->activo == "1") checked @endif data-bootstrap-switch data-off-color="danger" data-on-color="success">
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
    $("#customFile").change(function() {
      readURL(this);
    });
  });

  function readURL(input) {
    $('#visor_imagenes').html("");
    for(let i = 0; i < input.files.length; i++){
      var reader = new FileReader();
      
      reader.onload = function(e) {
        $('#visor_imagenes').append("<div class='col-md-3' style='padding: 10px;border: 2px solid #f1f1f1; border-radius: 4px;'><h3>" + (i+1) +"</h3><img style='width: 100%;' src='" + e.target.result + "'></div>");
      }
      
      reader.readAsDataURL(input.files[i]); // convert to base64 string
    }
  }
  
  $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
  });
  
</script>
@stop