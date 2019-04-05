<div class="card block-shadow my-3" data-noteid={{ $note->id }}>
    <a href="{{ route('note.show', ['id' => $note->id]) }}" class="block-link"></a>
    <div class="card-header bg-primary text-white d-flex">
        <span class="h4 mb-0">{{ $note->theme }}</span>
        <div class="ml-auto d-flex">
            <a class="lection-card__link link_white  pr-3" href="{{ route('note.edit', ['id' => $note->id])}}" role="button"><i class="fas fa-pen"></i></a>
            <a class="lection-card__link link_white  delete-button" href="#" role="button" data-id={{ $note->id }}>
                <i class="fas fa-times"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <pre class="block-restriction mw-100">{{ $note->rightColumn }}</pre>
        <div class="d-flex mt-3 justify-content-between">
            <a href="{{ route('subject', ['id' => $note->subject->id]) }}" class="card-link lection-card__link">{{ $note->subject->name }}</a>
        </div>
    </div>
</div>
