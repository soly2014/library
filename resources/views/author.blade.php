@extends('layout.master')
@section('content')

<div class="container-fluid">

	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center text-primary">
                            

                            Welcome : {{ $authors->first_name." ".$authors->last_name }} 


			</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table">
					<tr class="success">
                       <td><h3>First Name</h3></td>
                       <td>{{ $authors->first_name }}</td>
                       <td><h3>Last Name</h3></td>
                       <td>{{ $authors->last_name }}</td>
					</tr>
					<tr class="warning">
                       <td><h3>Date Of Birth</h3></td>
                       <td>{{ $authors->DOB }}</td>
                       <td><h3>Address</h3></td>
                       <td>{{ $authors->Address }}</td>
					</tr>
			</table>
		</div>

	</div>
         <h2>the books you wrote : {{ count($author_books) }} </h2>

@foreach($author_books as $books)
         <h4>{{ $books->book_title }}</h4>

@endforeach

</div>    </div>
</div>

</body>

</html>
@stop
