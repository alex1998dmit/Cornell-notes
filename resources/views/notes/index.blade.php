@extends('layouts.app')
@section('content')
  <a class="btn btn-danger lection-card__btn lection-card__delete delete-button text-white" data-id={{ $note->id }}>Удалить</a>
@endsection
