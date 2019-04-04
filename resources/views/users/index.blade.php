@extends('layouts.app')
@section('content')

<div class="row mt-5">
    <div class="col-sm-3">
        <div class="row">
            <img class="profile__avatar img-fluid" src="{{asset('uploads/avatars/'.Auth::user()->avatar)}}" alt="avatar">
        <h2 class="pt-3 mb-0"> {{ Auth::user()->name }}</h2>
        {{-- !!!!! --}}
        {{-- <h2 class="pt-3 mb-0"> {{ Auth::user()->surname }}</h2> --}}
            <div class="w-100"></div>
            <p>{{ Auth::user()->email }}</p>
            <div class="w-100"></div>
            <span class="h5">Предметов: {{ count($subjects)}}</span>
            <div class="w-100"></div>
            <span class="h5">Лекций: {{ count($notes) }}</span>
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
                <div class="row">
                    <div class="col">
                        <ul class="nav nav-tabs mb-4" role="tablist">
                            <li class="nav-item">
                                <a href="#all" class="nav-link active" role="tab" data-toggle="tab">Все</a>
                            </li>
                            <li class="nav-item">
                                <a href="#subjects" class="nav-link" role="tab" data-toggle="tab">По темам</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane in active" id="all">
                        <div class="lection mb-5">
                            <div class="row justify-content-between">
                                <div class="col-auto">
                                    <a class="lection__more d-flex text-dark" data-toggle="collapse" href="#all-subjects" role="button" aria-expanded="false" aria-controls="all-subjects">
                                    <i class="fas fa-caret-down mt-2 text-dark dropdown-arrow pr-2"></i>
                                    <h2 class="lection__theme">Все лекции</h2>
                                    </a>
                                </div>
                                <div class="col-auto">
                                    {{-- <a class="btn btn-danger lection__theme-delete text-white" href="#">Удалить</a> --}}
                                </div>
                            </div>
                            <div class="row">
                                <hr class="col">
                            </div>
                            <div class="row collapse" id="all-subjects">
                            @foreach ($notes as $note)
                                <div class="row col-12 ml-0 align-items-center justify-content-between pt-2 pb-2 mb-2 lection-card" data-noteid={{ $note->id }} >
                                    <a href="{{ route('note.show', ['id' => $note->id]) }}" class="block-link"></a>
                                    <span class="col-5 lection-card__title">{{ $note->theme }}</span>
                                    <span class="col-2 lection-card__date">{{ $note->updated_at}}</span>
                                    <div class="col-auto justify-self-end lection-card__buttons">
                                        <a class="btn btn-info lection-card__btn lection-card__edit" href="{{ route('note.edit', ['id' => $note->id])}}">Редактировать</a>
                                        {{-- href="{{ route('note.delete', ['id' => $note->id]) }}" --}}
                                    <a class="btn btn-danger lection-card__btn lection-card__delete delete-button text-white" data-id={{ $note->id }}>Удалить</a>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="subjects">
                    @foreach($subjects as $subject)
                    <div class="lection mb-4" data-subid = {{ $subject->id }}>
                        <div class="row">
                            <div class="col">
                                <a class="lection__more d-flex text-dark" data-toggle="collapse" href="#subject{{ $subject->id }}" role="button" aria-expanded="false" aria-controls="subject{{ $subject->id }}">
                                <i class="fas fa-caret-down mt-2 text-dark dropdown-arrow pr-2"></i>
                                <h2 class="lection__theme">{{ $subject->name }}</h2>
                                </a>
                            </div>
                            <div class="col-auto">
                                    <a class="btn btn-success lection__theme-delete" href="{{ route('note.create', ['subject_name' => $subject->name])}}">Добавить лекцию</a>
                                    <a class="btn btn-danger lection__theme-delete theme-delete delete-button-subject text-white" data-id={{ $subject->id}}>Удалить</a>
                            </div>
                        </div>
                        <div class="row">
                            <hr class="col">
                        </div>
                        <div class="row collapse" id="subject{{ $subject->id }}">
                        @foreach ($notes as $note)
                            @if($note->subject_id == $subject->id)
                                <div class="row col-12 ml-0 align-items-center justify-content-between pt-2 pb-2 mb-2 lection-card" data-noteid={{ $note->id }}>
                                    <a href="#" class="block-link"></a>
                                    <span class="col-5 lection-card__title">{{ $note->theme }}</span>
                                    <span class="col-2 lection-card__date">{{ $note->updated_at}}</span>
                                    <div class="col-auto justify-self-end lection-card__buttons">
                                        <a class="btn btn-info lection-card__btn lection-card__edit" href="{{ route('note.edit', ['id' => $note->id])}}">Редактировать</a>
                                        <a class="btn btn-danger delete-button lection-card__btn lection-card__delete text-white" data-id={{ $note->id }}>Удалить</a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        </div>
                    </div>
                    @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        let url_note_delete = "{{ route('note.delete') }}";
        let url_subject_delete = "{{ route('subject.delete') }}";

        $(document).on("click", '.delete-button', function(e){
            e.preventDefault();
            let id = $(this).data('id');
            $.ajax({
                    url:url_note_delete,
                    type: 'post',
                    data:{ id: id, _token: CSRF_TOKEN },
                    dataType: 'json',
                    success: function(data) {
                        $(` div[data-noteid= ${data.id} ] `).remove();
                    },
                });
            });

        $(document).on("click", '.delete-button-subject', function(e){
            e.preventDefault();
            let id = $(this).data('id');
            $.ajax({
                url:url_subject_delete,
                type: 'post',
                data:{ id: id, _token: CSRF_TOKEN },
                dataType: 'json',
                success: function(data) {
                    $(` div[data-subid= ${data.id} ] `).remove();
                },
            });
        });
        
    </script>
    @endsection
</div>
