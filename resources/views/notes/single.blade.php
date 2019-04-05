@extends('layouts.app')
@section('content')
    <main role="main">
        <h1 class="display-4 mt-4 mb-0">{{ $note->theme }}</h1>
        <a href="{{ route('subject', ['id' => $note->subject->id]) }}" class="lead d-block mb-4">{{ $note->subject->name }}</a>
        <form action="{{ route('note.store') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Основные мысли</label>
                <textarea class="form-control" name="leftColumn" id="leftColumn" rows="10" readonly>{{$note->leftColumn}}</textarea>
            </div>
            <div class="form-group">
                <label for="">Лекция</label>
                <textarea class="form-control" name="rightColumn" id="rightColumn" rows="10" readonly>{{$note->rightColumn}}</textarea>
            </div>
            <div class="form-group">
                <label for="">Резюме</label>
                <textarea class="form-control" name="bottemColumn" id="bottemColumn" rows="10" readonly>{{$note->bottemColumn}}</textarea>
            </div>
            <a class="btn btn-primary" href="{{ route('note.edit', ['id' => $note->id])}}" role="button">Редактировать</a>
            <a class="btn btn-danger text-white" href="{{ route('note.trash', ['id' => $note->id]) }}}">Удалить</a>
        </form>
    </main>
@endsection
