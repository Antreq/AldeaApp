@extends('admin.layout')

@section('header')
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Todos los usuarios registrados</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->

@stop

@section('content')
	<div class="card">
            <div class="card-header">
              <!--<h3 class="card-title">DataTable with default features</h3>-->

              <button class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-circle"> </i> Crear usuario</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="posts-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Roles</th>
                </tr>
                </thead>
                <tbody>
                	@foreach ($users as $user)
                		<tr>
                			<td>{{$user->id}}</td>
                			<td>{{$user->name}}</td>
                			<td>{{$user->email}}</td>
                      <td>{{$user->getRoleNames()->implode(', ')}}</td>

                			<td>
                        <a href="{{route('admin.users.show', $user) }}" class="btn btn-xs btn-light" target='_blank'>
                          <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{route('admin.users.edit', $user) }}" class="btn btn-xs btn-info">
                          <i class="fa fa-pencil-alt"></i>
                        </a>
                        <form method="POST" action="{{route('admin.users.destroy', $user) }}" style="display:inline">
                          {{csrf_field()}}{{method_field('DELETE')}}
                          <button href="#" class="btn btn-xs btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar este usuario?')">
                            <i class="fa fa-times"></i>
                          </button>
                        </form>
                      </td>
                		</tr>
                	@endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          
@stop

@push('scripts')

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form method="POST" action=" {{route('admin.posts.store')}} ">
  {{csrf_field() }}
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Título de la publicación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group" >
                  <label {{ $errors->has('title') ? 'class=text-danger' : ''}} >Título de la publicación</label>
                  <input name="title" placeholder="Ingresa aquí el título de tu publicación" class="form-control {{ $errors->has('title') ? 'is-invalid' : ''}}" value="{{ old('title')}}" required>
                  {!!$errors -> first('title', '<span class="text-danger"> :message </span>')!!}
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary">Crear publicación</button>
      </div>
    </div>
  </div>
</form>
</div>

<script src="/adminlte/plugins/datatables/jquery.dataTables.js"></script>
<script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script>
  $(function () {
    $('#posts-table').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
@endpush