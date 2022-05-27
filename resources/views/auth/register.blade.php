@extends('layouts.auth')
	@section('content')
		<div class="container">
			@if ($errors->any())
				<div class="alert alert-danger">
					<p>!Opss tenemos un problema</p>
					<ul> 
						@foreach ($errors->all() as $elem)
							<li>{{ $elem }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			<div class="row mt-5">
    			<div class="col-lg-3 col-centered">
    				<div class="card" style="width: 18rem;">
				  		<div class="card-body">
			    		<form class="row" action="{{ route('register') }}" method="POST">
			    			@csrf
		    				<h3>Regístrate</h3>
							<div class="mb-3">
		  						<label for="name" class="form-label">Nombre</label>
		  						<input type="text" class="form-control" id="name" name="name" placeholder="Tu nombre aquí" required>
							</div>
							<div class="mb-3">
		  						<label for="email" class="form-label">Correo</label>
		  						<input type="email" class="form-control" id="email" name="email" placeholder="alguien@example.com" required>
							</div>
							<div class="mb-3">
		  						<label for="password" class="form-label">Contraseña</label>
		  						<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
							</div>
							<div class="mb-3">
		  						<label for="pass_confirm" class="form-label">Confirma tu contraseña</label>
		  						<input type="password" class="form-control" id="pass_confirm" name="pass_confirm" placeholder="Confirmar contraseña" required>
							</div>
							<div class="mb-3">
		  						<button type="submit" class="btn btn-primary">Registrar</button>
		  						<button type="reset" class="btn btn-secondary">Limpiar</button>
							</div>
						</form>		
						</div>
					</div>
    			</div>
			</div>
		</div>
	@endsection	