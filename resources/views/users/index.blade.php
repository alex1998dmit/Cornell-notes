@extends('layouts.app')
@section('content')


<div class="row" style="border: 1px solid grey; border-radius: 1%; padding: 10px;">
    <div class="col-md-9">
        <p>Имя: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <p>Лекций: {{ count($user->note)}}</p>
        <p>Предметов: {{ count($user->subject   )}}</p>
    </div>
    <div class="col-md-3">
        <img src="{{asset('uploads/avatars/'.Auth::user()->avatar)}}" alt="" style="width:150px; height: 150px;border-radius: 50%;">
    </div>
</div>
@if(count($notes) == 0)
    <div class="lection mt-5 text-center">
        <h4>Вы не добавили не одной лекции, хотите добавить ?</h4>
        <div class="row">
            <div class="col">
            <a href="{{ route('note.create') }}" class="btn btn-success">Добавить лекцию</a>
            </div>
        </div>
    </div>
@else
    @foreach($subjects as $subject)
        @if(count($subject->note) > 0)
            <div class="lection mt-5">
                <div class="row">
                <div class="col">
                    <a class="lection__more d-flex text-dark" data-toggle="collapse" href="#subject{{ $subject->id }}" role="button" aria-expanded="false" aria-controls="subject{{ $subject->id }}">
                    <i class="fas fa-caret-down mt-2 text-dark dropdown-arrow pr-2"></i>
                    <h2 class="lection__theme">{{ $subject->name }}</h2>
                    </a>
                </div>
                <div class="col col-auto">
                    <a href="{{ route('note.create', ['subject_name' => $subject->name])}}" class="btn btn-success">Добавить лекцию</a>
                </div>
                <div class="w-100"></div>
                <hr class="col">
                </div>
                <div class="row collapse" id="subject{{ $subject->id }}">
                @foreach ($notes as $note)
                    @if($note->subject_id == $subject->id)
                        <div class="row col-12 align-items-center justify-content-between pt-2 pb-2 mb-2 lection-card">
                            <a href="#" class="block-link"></a>
                            <span class="col-7 lection-card__title">{{ $note->theme }}</span>
                            <span class="col-3 lection-card__date">{{ date('d-m-Y', strtotime($note->updated_at))}}</span>
                            <div class="col-auto justify-self-end lection-card__buttons">
                                <a class="btn btn-info lection-card__btn lection-card__edit" href="{{ route('note.edit', ['id' => $note->id])}}">Edit</a>
                                <a class="btn btn-danger lection-card__btn lection-card__delete" href="{{ route('note.delete', ['id' => $note->id]) }}">Delete</a>
                            </div>
                        </div>
                    @endif
                @endforeach
                </div>
            </div>
        @endif
    @endforeach

@endif
@endsection
