@extends('admin.layout.master')
@section('page_title')
  Productos
@stop
@section('content')

    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Eliminar producto</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Estas seguro que deseas eliminar el producto?</p>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-danger" onClick="deleteProduct()">Eliminar</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

  <div class="row">
    <div class="form-group col-md-12">
      <a href="{{ route('productos.create') }}" class="btn btn-default float-right">Nuevo producto</a>
    </div>
  </div>
  <table id="tblProductos" class="table table-hover table-bordered text-nowrap">
    <thead>
      <tr>
        <th>#</th>
        <th>Titulo</th>
        <th>Descripcion</th>
        <th>Estado</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
  </table>
@stop
@section('scripts')
<script>
  var delete_id = undefined;
  var products = {
    get: () => {
      let response = fetch("{{route('productos.getAll')}}", {
        method: "GET",
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
      })
      .then(function(response) {
        return response.json();
      })
      .catch(function(response){
        return response;
      });

      return response;
    },
    delete: () => {
      let response = fetch("productos/" + delete_id + "/delete", {
        method: "POST",
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
      })
      .then(function(response) {
        return response.json();
      })
      .catch(function(response){
        return response;
      });

      return response;
    }
  }

  function deleteProduct(){
    products.delete()
    .then((data) => {
      if(data.response){
        $("#modal-default").modal('hide');
        showListData();
      }
    })
    .catch((data) => {
      console.log(data);
    })
  }

  function showModalDeleteProduct(id){
    delete_id = id;
    $("#modal-default").modal("show");
  }
  
  showListData();
  function showListData(){
    products.get()
    .then(_data => {
      $("#tblProductos").DataTable().clear().destroy();
      $("#tblProductos").DataTable({
        "responsive": true,
        "autoWidth": false,
        columns: [
              { title: "#", data: "id" },
              { title: "Titulo", data: "titulo" },
              { title: "Descripcion", data: "descripcion" },
              { title: "Estado", data: "activo", "mRender": function(data, type, row){
                return (data === "1") ? "<span class='fas fa-check' style='color: green;'></span>" : "<span class='fa fa-times' style='color: red;'></span>";
              }},
              {
                "mData": "",
                "mRender": function (data, type, row) {
                  return "<a href='productos/" + row.id + "/edit/' class='fas fa-edit' style='color: black;'></a>";
                }
              },
              {
                "mData": "",
                "mRender": function (data, type, row) {
                  return "<span onClick='showModalDeleteProduct(" + row.id + ")' class='fa fa-trash' style='cursor:pointer;'></span>"
                  // return "<a href='productos/" + row.id + "/edit/'>DELETE</a>";
                }
              }
            ],
        data: _data,
        order: [[ 0, "desc" ]]
      });
    })
    .catch(_data => {
      console.log(_data);
    });
  }
</script>
@stop