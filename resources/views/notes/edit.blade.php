@extends('layouts.app')

@section('content')
    @if(count($errors))
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
    <form action="{{ route('note.update', ['id' => $note->id]) }}" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="subject">Название предмета:</label>
                    <input list="subjects" name="subject" id="subject" class="form-control" value="{{ $currentSubject }}">
                    <datalist id="subjects">
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->name}}">
                                {{ $subject->name}}
                            </option>
                        @endforeach
                    </datalist>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="theme">Название темы:</label>
                    <input type="text" name="theme" id="theme" class="form-control" value="{{ $note->theme }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Выберите тип конспекта:</label>
                    <div>
                        <label for=""><input type="radio" name="isOpen" value="true"
                            @if($note->isOpen)
                                checked
                            @endif
                            >
                            Открыто
                        </label>
                    </div>
                    <div>
                        <label for=""><input type="radio" name="isOpen" value="false"
                            @if(!$note->isOpen)
                                checked
                            @endif
                        >
                            Закрыто
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row col-md-12 pr-0">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                    <textarea name="leftColumn" id="leftColumn" cols="40" rows="40" placeholder="Ваши вопросы по ходу лекции основные понятия" class="form-control">{{$note->leftColumn}}</textarea>
                    </div>
                </div>
                <div class="col-md-8 pr-0">
                    <div class="form-group">
                    <textarea name="rightColumn" id="rightColumn" cols="100" rows="40" placeholder="Лекция" class="form-control">{{$note->rightColumn}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 pr-0">
                    <div class="form-group">
                        <textarea name="bottemColumn" id="bottemColumn" cols="154" rows="10" placeholder="Выводы" class="form-control">{{$note->bottemColumn}}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-right">
                <a class="btn mr-2" type="submit" href="{{ route('note.delete', ['id' => $note->id]) }}}">Удалить</a>
                <button class="btn btn-success" type="submit">Сохранить</button>
            </div>
        </div>
    </form>
@endsection





