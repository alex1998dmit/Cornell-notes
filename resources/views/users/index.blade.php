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
                        @include('components.lection-card', ['note' => $note])
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
