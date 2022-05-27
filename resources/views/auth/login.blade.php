@extends('layouts.auth')
	@section('content')
		<div class="container">
			@if ($errors->any())
				<div class="alert alert-danger">
					<p>!Opps tenemos un problem</p>
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
			    		<form class="row" action="{{ route('login') }}" method="POST">
			    			@csrf
		    				<h3>Iniciar sesión</h3>
							<div class="input-group mb-3 mt-3">
		  						<span class="input-group-text" id="basic-addon1">📧</span>
		  						<input type="email" class="form-control" id="email" name="email" placeholder="Correo" required>
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text" id="basic-addon1">🔐</span>
		  						<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
							</div>
							<div class="mb-3">
		  						<button class="btn btn-primary">Entrar</button>
		  						<button class="btn btn-secondary">Limpiar</button>
							</div>
						</form>		
						</div>
					</div>
    			</div>
			</div>
		</div>
	@endsection