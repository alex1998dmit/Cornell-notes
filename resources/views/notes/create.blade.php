@extends('layouts.app')

@section('content')
    <form action="{{ route('note.store') }}" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12 text-right">
                <button class="btn btn-success" type="submit">Сохранить</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="subject">Название предмета:</label>
                    <input type="text" name="subject" id="subject" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="theme">Название темы:</label>
                    <input type="text" name="theme" id="theme" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <textarea name="leftColumn" id="leftColumn" cols="40" rows="40" placeholder="Ваши вопросы по ходу лекции основные понятия" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <textarea name="rightColumn" id="rightColumn" cols="100" rows="40" placeholder="Лекция" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea name="bottemColumn" id="bottemColumn" cols="154" rows="10" placeholder="Выводы" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection


