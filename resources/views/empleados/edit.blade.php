@extends('layouts.index')
	@section('content')
	<div class="container mt-2">
		@if (session('success'))
			<div class="alert alert-success">
				{{ session('success') }}
			</div>
		@endif
		@if ($errors->any())
			<div class="alert alert-danger">
				<p>
					!Opps ha ocurrido un error :(
				<ul>
					@foreach ($errors->all() as $elem)
						<li>{{ $elem }}</li>
					@endforeach
				</ul> 
				</p>
			</div>
		@endif
		<div><p><h3><b>Editar empleado</b></h3></p></div>
			<form class="row gy-3 mb-3" action="{{ route('empleados.update', $empleado->id) }}" method="POST">
				@csrf
				@method('PATCH')
				<div class="col-sm-6">
					<label for="nombre" class="form-label"><b>Nombre</b></label>
					<input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Nombre del empleado" value="{{ $empleado->nombre }}">
				</div>
				<div class="col-sm-6">
					<label for="cedula" class="form-label"><b>Cedula</b></label>
					<input type="number" required class="form-control" id="cedula" name="cedula" placeholder="Cédula" value="{{ $empleado->cedula }}">
				</div>
				<div class="col-sm-6">
					<label for="movil" class="form-label"><b>Móvil</b></label>
					<input type="number" class="form-control" id="movil" name="movil" required placeholder="Móvil" value="{{ $empleado->movil }}">
				</div>
				<div class="col-sm-6">
					<label for="direccion" class="form-label"><b>Direccion</b></label>
					<input type="text" class="form-control" id="direccion" name="direccion" required placeholder="Dirección" value="{{ $empleado->direccion }}">
				</div>
				<div class="col-sm-6">
					<label for="direccion" class="form-label"><b>Foto de perfil</b></label>
					<input type="url" class="form-control" id="foto_perfil" name="foto_perfil" required placeholder="Foto de perfil" value="{{ $empleado->foto_perfil }}">
					<div class="form-text">Utiliza una imagen de internet como foto de perfil</div>
				</div>
				<div class="col-sm-6">
					<img src="{{ $empleado->foto_perfil }}" height="150" style="border-radius: 5px;">
				</div>
				<div class="col-sm-12">
					<button type="submit" class="btn btn-success">
					Guardar cambios
					</button>
					<button type="reset" class="btn btn-secondary">Limpiar campos</button>
				</div>
			</form>
	</div>
	@endsection