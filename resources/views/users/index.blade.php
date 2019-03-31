@extends('layouts.app')
@section('content')


<!-- <div class="row" style="border: 1px solid grey; border-radius: 1%; padding: 10px;">
    <div class="col-md-9">
        <p>Имя: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <p>Лекций: {{ count($user->note)}}</p>
        <p>Предметов: {{ count($user->subject   )}}</p>
    </div>
    <div class="col-md-3">
        <img src="{{asset('uploads/avatars/'.Auth::user()->avatar)}}" alt="" style="width:150px; height: 150px;border-radius: 50%;">
    </div>
</div> -->
<div class="row mt-5">
    <div class="col-sm-3">
        <div class="row">
            <img class="profile__avatar img-fluid" src="{{asset('uploads/avatars/'.Auth::user()->avatar)}}" alt="avatar">
            <h2 class="pt-3">Sanya Noob</h2>
            <span class="h5">Количество предметов: 3</span>
            <span class="h5">Количество лекций: 20</span>
        </div>
    </div>
    <div class="col-sm-9">
        <div class="ml-5">
            @if(count($notes) == 0)
                <div class="lection text-center">
                    <h4>Вы не добавили ни одной лекции, хотите добавить?</h4>
                    <div class="row">
                        <div class="col pt-3">
                        <a href="{{ route('note.create') }}" class="btn btn-success">Добавить лекцию</a>
                        </div>
                    </div>
                </div>
            @else
                @foreach($subjects as $subject)
                <div class="lection mb-5">
                    <div class="row">
                        <div class="col">
                            <a class="lection__more d-flex text-dark" data-toggle="collapse" href="#subject{{ $subject->id }}" role="button" aria-expanded="false" aria-controls="subject{{ $subject->id }}">
                            <i class="fas fa-caret-down mt-2 text-dark dropdown-arrow pr-2"></i>
                            <h2 class="lection__theme">{{ $subject->name }}</h2>
                            </a>
                        </div>
                        <div class="w-100"></div>
                        <hr class="col">
                    </div>
                    <div class="row collapse" id="subject{{ $subject->id }}">
                    @foreach ($notes as $note)
                        @if($note->subject_id == $subject->id)
                            <div class="row col-12 ml-0 align-items-center justify-content-between pt-2 pb-2 mb-2 lection-card">
                                <a href="#" class="block-link"></a>
                                <span class="col-5 lection-card__title">{{ $note->theme }}</span>
                                <span class="col-2 lection-card__date">{{ $note->updated_at}}</span>
                                <div class="col-auto justify-self-end lection-card__buttons">
                                    <a class="btn btn-info lection-card__btn lection-card__edit" href="{{ route('note.edit', ['id' => $note->id])}}">Edit</a>
                                    <a class="btn btn-danger lection-card__btn lection-card__delete" href="{{ route('note.delete', ['id' => $note->id]) }}">Delete</a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    </div>
                </div>
                @endforeach

            @endif
        </div>
    </div>
    @endsection
</div>
