@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal1">Create</button>
                </div>

                <p class="text-success">{{Session::get('message')}}</p>

                <div class="card-body">

                                    <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Sex</th>
                        <th scope="col">Age</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($allItem as $item)
                        <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->type}}</td>
                        <td>{{$item->qty}}</td>
                        <td>

                        <button type="button" onclick="editar('<?php print_r($item->id); ?>')"  class="btn btn-warning" data-dismiss="modal">Edit</button>
                        <button type="button" onclick="eliminar('<?php print_r($item->id); ?>')" class="btn btn-danger" data-dismiss="modal">Delete</button>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit user</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="modal-body" class="modal-body">
<!--Inicia formulario -->

<form method="post" action="{{route('saveItem')}}">
@csrf

  <div class="form-group">
    <label for="exampleInputEmail1">Name:</label>
    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter Name">
  </div>
  <div class="form-group">
  <label for="exampleInputEmail1">Sex:</label>
    <input type="text" class="form-control" id="type" name="type" aria-describedby="emailHelp" placeholder="Enter Sex">
  </div>
  <div class="form-group">
  <label for="exampleInputEmail1">Age:</label>
    <input type="text" class="form-control" id="qty" name="qty" aria-describedby="emailHelp" placeholder="Enter Age">
  </div>

<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> <button type="submit" class="btn btn-primary">Save</button>
</form>

<!-- Finaliza formulario-->
      </div>
      <div class="modal-footer">
        <!--button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button-->
      </div>
    </div>
  </div>
</div>
<!-- finaliza modal -->

<!-- Modal -->
<div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create user</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="modal-body" class="modal-body">
<!--Inicia formulario -->

<form method="post" action="{{route('saveItem')}}">
@csrf

  <div class="form-group">
    <label for="exampleInputEmail1">Name:</label>
    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter Name">
  </div>
  <div class="form-group">
  <label for="exampleInputEmail1">Sex:</label>
    <input type="text" class="form-control" id="type" name="type" aria-describedby="emailHelp" placeholder="Enter Sex">
  </div>
  <div class="form-group">
  <label for="exampleInputEmail1">Age:</label>
    <input type="text" class="form-control" id="qty" name="qty" aria-describedby="emailHelp" placeholder="Enter Age">
  </div>

<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> <button type="submit" class="btn btn-primary">Save</button>
</form>

<!-- Finaliza formulario-->
      </div>
      <div class="modal-footer">
        <!--button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button-->
      </div>
    </div>
  </div>
</div>
<!-- finaliza modal -->



<script>
function editar(id) {

var urledit = "<?php echo route('editItem'); ?>";

//var urledit = "<?php echo route('updateItem'); ?>";

var id;

//alert(urledit);
//window.location.href = urledit + "?id=" + id;

var formData = new FormData();
//formData.append("id", id);


 $.ajax({
            url: urledit + '?id=' + id,
            type: "get",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            async: false,
            success: function(response) {

//alert(response);
var resuldatos = document.getElementById('modal-body');
        resuldatos.innerHTML = response;
//location.reload();
$('#exampleModal').modal('show');

            }
     
    });

}


function eliminar(id) {
var id;

var urledit = "<?php echo route('deleteItem'); ?>";

if (confirm('Delete record?')) {

var id;

var formData = new FormData();

 $.ajax({
            url: urledit + '?id=' + id,
            type: "get",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            async: false,
            success: function(response) {

location.reload();

            }
     
    });

}else{
alert('The record was not deleted');

}


}





</script>


@endsection