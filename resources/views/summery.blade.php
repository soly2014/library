@extends('layout.master')
@section('content')
	
	<div class="container">
			
			<table class="table">
				<tr>
				<th style="width:25%">Section name</th>
				<th style="width:25%">Book title</th>
				<th style="width:25%">Book description</th>
				<th style="width:25%">Authors </th>
				</tr>

			@foreach($results as $bookModel)	

				<tr>

						<td><span class="label label-info">{{ $bookModel->section->section_name }}</span></td>
						<td>{{ $bookModel->book_title }}</td>
						<td>{{ $bookModel->book_description }}</td>
						<?php $authors = $bookModel->authors ?>
						<td>

								@foreach($authors as $author)	

									<span class="label label-danger">{{ $author->first_name.' '.$author->last_name }}</span>

			                     @endforeach	

						</td>





				</tr>

			@endforeach	
</table>
</div>
    </div>
</div>

</body>

</html>
@stop
