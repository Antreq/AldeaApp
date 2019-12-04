@extends('admin.layout')

@section('content')
<br><br>
<div class="row justify-content-md-left">
	<div class="col-md-5">
	<div class="card card-primary">
		<div class="card-header with-border">
			<h3 class="card-title">Datos personales, {{$user->name}}</h3>
		</div>
		<div class="card-body">
			<ul class="list-group">
				@foreach ($errors->all() as $error)
					<li class="list-group-item list-group-item-danger">
						{{$error}}
					</li>
				@endforeach
			</ul>
			<form method="POST" action="{{route('admin.users.update', $user)}}">
				{{ csrf_field() }} {{ method_field('PUT') }}
				<div class="form-group">
					<label for="name">Nombre:</label><br>
					<input name="name" value="{{ old('name', $user->name)}}" class="form-group" style="display:block;">
				</div>
				<div class="form-group">
					<label for="email">Email:</label><br>
					<input name="email" value="{{old('email', $user->email)}}" class="form-group">
				</div>
				<span class="help-block">Dejar en blanco la contraseña si no deseas cambiarla</span>
				<div class="form-group">
					<label for="password">Contraseña:</label><br>
					<input type="password" name="password" class="form-group" placeholder="Contraseña">
				</div>
				<div class="form-group">
					<label for="password_confirmation">Repite la contraseña:</label><br>
					<input type="password" name="password_confirmation" class="form-group" placeholder="Repite la Contraseña">
				</div>
				<button class="btn btn-primary btn-block">Actualizar datos</button>
			</form>
		</div>
	</div>
	</div>
</div>

@stop