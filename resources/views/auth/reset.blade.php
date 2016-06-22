@extends('layout.master')
@section('content')

	<div class="row">
		<div class="col-md-4">
		<h1>Send Password Reset Link</h1>

		</div>
		<div class="col-md-4">
			{!! Form::open(['url'=>'/password/reset']) !!}
			{!! Form::hidden('token',$token) !!}

				@if(count($errors)>0)

					<div class="alert alert-danger">

						<ul>
							@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>

					</div>

				@endif
				<form role="form">

				<div class="form-group">
					 
					<label for="exampleInputEmail1">
						Email address
					</label>
			{!! Form::email('email','Enter your E_mail',[ 'class'=>'form-control', 'id'=>'exampleInputEmail1']) !!}				
					</div>
				<div class="form-group">
					 
					<label for="exampleInputPassword1">
						Password
					</label>
			{!! Form::password('password',[ 'class'=>'form-control', 'id'=>'exampleInputPassword1']) !!}				
				</div>
				<div class="form-group">
					 
					<label for="exampleInputPassword1">
						confirm your Password
					</label>
			{!! Form::password('password_confirmation',[ 'class'=>'form-control', 'id'=>'exampleInputPassword1']) !!}				
				</div>


			{!! Form::submit('reset password',['class'=>'btn btn-info']) !!}		
				</button>
			{!! Form::close() !!}
				</div>
	</div>
    </div>
</div>

</body>

</html>
@stop
