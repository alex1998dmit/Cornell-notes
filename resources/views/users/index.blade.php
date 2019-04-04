@extends('layouts.app')
@section('content')

<main role="main">
    <div class="row justify-content-between">
        <div class="col-md-4 col-lg-3 mr-md-5 text-center text-md-left">
            <div class="jumbotron bg-white mb-3 pb-3 shadow">
                <img class="profile-avatar img-fluid rounded" src="{{asset('uploads/avatars/'.Auth::user()->avatar)}}" alt="avatar">
                <span class="d-block h4 mt-2 mb-0">{{ Auth::user()->name }} {{ Auth::user()->surname }}</span>
                <span class="h6 lead"><small class="text-restriction">{{ Auth::user()->email }}</small></span>
            </div>
            <ul class="list-group nav nav-pills shadow rounded my-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a href="#pills-lections" class="list-group-item list-group-item-action active border-0" id="pills-lections-tab" data-toggle="pill" role="tab" aria-controls="pills-lections" aria-selected="true">Лекции</a>
                </li>
                <li class="nav-item">
                    <a href="#pills-subjects" class="list-group-item list-group-item-action border-0" id="pills-subjects-tab" data-toggle="pill" role="tab" aria-controls="pills-subjects" aria-selected="false">Темы</a>
                </li>
            </ul>
            <div class="list-group shadow my-3">
                <a href="{{ route('logout') }}" class="list-group-item list-group-item-action" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выйти</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
            </div>
        </div>
        <div class="col">
            <div class="jumbotron bg-white shadow tab-content" id="pills-tabContent">
                <div class="tab-pane show active" id="pills-lections" role="tabpanel" aria-labelledby="pills-lections-tab">
                    <h2 class="mb-4">Лекции:</h2>
                    @foreach ($notes as $note)
                        <div class="card block-shadow my-3">
                            <a href="#" class="block-link"></a>
                            <div class="card-header bg-primary text-white d-flex">
                                <span class="h4 mb-0">{{ $note->theme }}</span>
                                <div class="ml-auto">
                                    <a class="card-link lection-card__link link_white  pr-3" href="{{ route('note.edit', ['id' => $note->id])}}" role="button"><i class="fas fa-pen"></i></a>
                                    <a class="card-link lection-card__link link_white  delete-button" href="#" role="button" data-id={{ $note->id }}>
                                        <i class="fas fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <span class="block-restriction">{{ $note->rightColumn }}</span>
                                <div class="d-flex mt-3 justify-content-between">
                                    <a href="{{ route('subject', ['id' => $note->subject->id]) }}" class="card-link lection-card__link">{{ $note->subject->name }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="tab-pane" id="pills-subjects" role="tabpanel" aria-labelledby="pills-subjects-tab">
                    <h2 class="mb-4">Темы:</h2>
                    @foreach ($subjects as $subject)
                    <div class="card block-shadow my-3">
                        <div class="card-header bg-primary text-white d-flex">
                            <a href="{{ route('subject', ['id' => $subject->id]) }}" class="block-link"></a>
                            <span class="h4 mb-0">{{ $subject->name }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</main>

<!-- <div class="row mt-5">
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
    </div> -->
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
