@extends('../layouts.app')

    @section('content')
    <div class="row">
        <div class="col-md-12">
            @foreach ($subjects as $subject)
                <h3>{{$subject->name }}</h3>
            @endforeach
        </div>
    </div>
    @endsection

