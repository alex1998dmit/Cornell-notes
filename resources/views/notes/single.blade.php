@extends('layouts.app')

    @section('content')

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
