@extends('layout.master')
@section('content')

<div class="container">
<h1> show books of section {{ $section->id }}</h1>

	<table class="table">

		<tr>
			<td>Enter the book title</td>
       		{!! Form::open(['url' => route('add-books',['id'=>$section->id])]) !!}
		    	<td> {!! Form::text('book_title')!!}</td>

		    </tr>
		    <tr>
		    	<td>Enter the book edition number</td>

		    	 <td>{!! Form::text('book_edition') !!}</td></tr>
		    	

		    <tr>
		    	<td>Enter the book description</td>

		    	<td>{!! Form::textarea('book_description') !!}</td>
		    </tr>
		     <tr>
		    	<td>Enter another author </td>

		    	 <td>{!! Form::text('author_two') !!}</td>
		    </tr>

			<tr>
				<td></td>
			<td>	
		     {!! Form::submit('Add Books',['class'=>'btn btn-primary']) !!}
			{!! Form::close() !!}
		</td>
		</tr>

    </table>
	<table class="table">
		<tr>
				<th><h3> Book Title</h3></th>
				<th><h3> Book edition</h3></th>
				<th><h3> Book description</h3></th>
				<th><h3> Authors</h3></th>
				
		</tr>

					<?php $i=0; ?>
					@foreach($all_books as $book)

		<tr>

				{!! Form::open(['url' => route('books-update',['id'=>$section->id]),'method'=>'put']) !!}
                
                <td><h4>{!! Form::text('book_title',$book->book_title) !!}</h4></td>
                <td><h4>{!! Form::text('book_edition',$book->book_edition) !!}</h4></td>
                <td><h4>{!! Form::textarea('book_description',$book->book_description) !!}</h4></td>

                		{!! Form::hidden('book_id',$book->id) !!}

                		<?php $authors = $array_of_authors[$i]; ?>
                		@foreach($authors as $author)
                <td> <a href="{{ route('author',['id'=>$author->id]) }}"><button type="button" class="label label-info">{{ $author->first_name }}</button></a></td>
                		@endforeach
                <td>    {!! Form::submit('update',['class'=>'btn btn-success']) !!}</td>
                		{!! Form::close() !!}


			{!! Form::open(['url' => route('books-delete',['id'=>$section->id]), 'method'=>'delete' ]) !!}
			              {!! Form::hidden('book_id',$book->id) !!}

				 <td> {!! Form::submit('delete',['class'=>'btn btn-danger']) !!}</td>

		</tr>	
					{!! Form::close() !!}
				   <?php $i++; ?>

					@endforeach
	</table>

</div>
    </div>
</div>

</body>

</html>
@stop
