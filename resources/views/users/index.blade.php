@extends('layouts.app')

@section('content')
@foreach($subjects as $subject)
  <div class="lection mt-5">
    <div class="row justify-content-between">
      <div class="col">
        <h2 class="lection__theme">{{ $subject->name }}</h2>
      </div>
      <div class="col col-auto">
        <a href="#" class="btn btn-success">Добавить лекцию</a>
      </div>
      <div class="w-100"></div>
      <hr class="col">
    </div>
    @foreach ($notes as $note)
        @if($note->subject_id == $subject->id)
            <div class="row align-items-center justify-content-between pt-2 pb-2 mb-2 lection-card">
                <a href="#" class="block-link"></a>
                <span class="col-7 lection-card__title">{{ $note->theme }}</span>
                <span class="col-3 lection-card__date">{{ $note->updated_at}}</span>
                <div class="col-auto justify-self-end lection-card__buttons">
                    <a class="btn btn-info lection-card__btn lection-card__edit" href="{{ route('note.edit', ['id' => $note->id])}}">Edit</a>
                    <a class="btn btn-danger lection-card__btn lection-card__delete" href="{{ route('note.delete', ['id' => $note->id]) }}">Delete</a>
                </div>
            </div>
        @endif
    @endforeach
  </div>
@endforeach
@endsection
