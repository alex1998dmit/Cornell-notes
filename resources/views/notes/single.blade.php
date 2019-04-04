@extends('layouts.app')

    @section('content')
    <a class="btn btn-danger lection-card__delete delete-button text-white" data-id={{ $note->id }}>Удалить</a>
    <div>
        <div class="row">
            <div class="col-md-12">
                {{ $note->subject->name }}
            </div>
        </div>
        <div class="row">
                <div class="col-md-12">
                    {{ $note->theme }}
                </div>
            </div>
        <div class="row">
            <div class="col-md-12">
                {{ $note->leftColumn}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {{ $note->rightColumn }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {{ $note->bottemColumn }}
            </div>
        </div>
    </div>
    @endsection
