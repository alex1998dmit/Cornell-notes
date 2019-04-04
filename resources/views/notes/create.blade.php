@extends('layouts.app')

@section('content')
    @if(count($errors))
            @foreach($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span>{{$error}}</span>
            </div>
            @endforeach
    @endif
    <main role="main">
        <h1 class="display-4 my-4">Создание лекции</h1>
        <form action="{{ route('note.store') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="note-title">Тема</label>
                <input class="form-control" type="text" id="theme" name="theme">
            </div>
            <div class="form-group">
                <label for="note-title">Предмет</label>
                <input class="form-control" type="text" id="subject" name="subject" list="subjects"  value="{{ $currentSubject }}">
                <datalist id="subjects">
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->name}}">
                            {{ $subject->name}}
                        </option>
                    @endforeach
                </datalist>
            </div>
            <hr>
            <div class="form-group">
                <label for="">Основные мысли</label>
                <textarea class="form-control" name="leftColumn" id="leftColumn" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="">Лекция</label>
                <textarea class="form-control" name="rightColumn" id="rightColumn" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="">Резюме</label>
                <textarea class="form-control" name="bottemColumn" id="bottemColumn" rows="10"></textarea>
            </div>
            <button class="btn btn-success" type="submit">Сохранить</button>
        </form>
    </main>
@endsection
