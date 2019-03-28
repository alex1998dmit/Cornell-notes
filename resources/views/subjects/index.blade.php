@extends('../layouts.app')

    @section('content')
    <div class="row">
        @foreach ($subjects as $subject)
            <div class="col-md-6">
                <p>{{$subject->name }}</p>
            </div>
            <div class="col-md-6">
                <a class="button btn-info" href="{{ route('subject', ['id' => $subject->id]) }}">Подробнее о предмете</button>
            </div>
        @endforeach
    </div>
    @endsection

