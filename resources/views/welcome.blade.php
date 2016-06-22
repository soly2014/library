@extends('layout.master')
@section('content')

@foreach($sections as $section)
    <div class="row widthdiv" >
        <div class="col-md-3">
            <h3 class="text-left text-primary">
             {{ $section->section_name }}
            </h3><img alt="Bootstrap Image Preview" src="{{ URL::to('/') }}/images/{{ $section->image_name }}" class="img-thumbnail imgwidth" /> <br><br>
            <a href="" class="btn btn-primary" type="button">soly go</a>
        </div>
@endforeach
       
    </div>
</div>

</body>

</html>
@stop
