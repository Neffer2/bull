@extends('layouts.index')
	@section('content')
		<div class="container mt-2">
			<div><p><h2><b>Lista de empleados</b></h2></p></div>
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
			<div class="row">
				<div class="col-md-12">
					<table class="table">
					  	<thead>
					    	<tr>	
					    		<th scope="col">#</th>
					      		<th scope="col">Nombre</th>
								<th scope="col">Cédula</th>
								<th scope="col">Dirección</th>
								<th scope="col">Móvil</th>
								<th scope="col">Foto de perfil</th>
								<th scope="col">Editar</th>
								<th scope="col">Eliminar</th>
							</tr>
						</thead>
					  	<tbody>
					  		@foreach ($empleados as $key => $elem)
					  			<tr>
							      	<th scope="row">{{ $key+=1 }}</th>
							      	<td>{{ $elem->nombre }}</td>
							      	<td>{{ $elem->cedula }}</td>
							      	<td>{{ $elem->direccion }}</td>
							      	<td>{{ $elem->movil }}</td>
							      	<td><img src="{{ $elem->foto_perfil }}" height="50" style="border-radius: 5px;"></td>
							      	<td>
						      			<a href="{{ route('empleados.edit', $elem->id) }}" class="btn btn-primary">Editar</a>
							      	</td>
							      	<td>
					      				<button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletemodal{{ $elem->id }}">Eliminar</button>
							      	</td>
					  			</tr>
					  			<!-- Modal -->
								<div class="modal fade" id="deletemodal{{ $elem->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog">
								    <div class="modal-content">
								      	<div class="modal-header">
								        	<h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
								        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								  			</div>
										    <div class="modal-body">
										        ¿Estás seguro de eliminar el empleado {{ $elem->nombre }}?
										    </div>
								  			<div class="modal-footer">
								  				<form action="{{ route('empleados.destroy', $elem->id) }}" method="POST">
								  					@csrf
								  					@method('DELETE')
									        		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
									        		<button type="submit" class="btn btn-danger">Eliminar</button>
								  				</form>
											</div>
										</div>
									</div>
								</div>
					  		@endforeach
					  	</tbody>
					</table>
				</div>
				<div class="col-md-6">
					<div><p><h3><b>Nuevo empleado</b></h3></p></div>
					@guest
						<p>Para gestionar los empleados debes <a href="/login">Iniciar sesión</a></p>
					@endguest
					@auth
						<form class="row gy-3 mb-3" action="{{ route('empleados.store') }}" method="POST">
							@csrf
							<div class="col-sm-6">
								<label for="nombre" class="form-label"><b>Nombre</b></label>
								<input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Nombre del empleado">
							</div>
							<div class="col-sm-6">
								<label for="cedula" class="form-label"><b>Cedula</b></label>
								<input type="number" required class="form-control" id="cedula" name="cedula" placeholder="Cédula">
							</div>
							<div class="col-sm-6">
								<label for="movil" class="form-label"><b>Móvil</b></label>
								<input type="number" class="form-control" id="movil" name="movil" required placeholder="Móvil">
							</div>
							<div class="col-sm-6">
								<label for="direccion" class="form-label"><b>Direccion</b></label>
								<input type="text" class="form-control" id="direccion" name="direccion" required placeholder="Dirección">
							</div>
							<div class="col-sm-6">
								<label for="direccion" class="form-label"><b>Foto de perfil</b></label>
								<input type="url" class="form-control" id="foto_perfil" name="foto_perfil" required placeholder="Foto de perfil">
								<div class="form-text">Utiliza una imagen de internet como foto de perfil</div>
							</div>
							<div class="col-sm-12">
								<button type="submit" class="btn btn-success">
								Crear
								</button>
								<button type="reset" class="btn btn-secondary">Limpiar campos</button>
							</div>
						</form>
					@endauth
				</div>
			</div>
		</div>
	@endsection