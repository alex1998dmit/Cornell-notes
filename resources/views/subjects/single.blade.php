@extends('layouts.app')

@section('content')
    <h1 class="display-4 my-4">Лекции по теме {{ $subject->name }}</h1>
    @foreach ($subject->note as $note)
        @include('components.lection-card', ['note' => $note])
    @endforeach
    <div>
@endsection
