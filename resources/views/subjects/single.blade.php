@extends('layouts.app')

@section('content')
    <h1 class="display-4 my-4">Лекции по теме {{ $subject->name }}</h1>
    @foreach ($subject->note as $note)
        @include('components.lection-card', ['note' => $note])
    @endforeach
    <div>
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

            </script>
@endsection
