@php
    $name = 'name' . '_' . app()->getLocale();
    $position = 'position' . '_' . app()->getLocale();
@endphp

<div class="member">
    <a class="boardImage" href="{{ route('web.board.show',$board_member->id) }}" aria-label="{{ $board_member->$name }}"><div style="--background: url(../storage/{{str_replace("\\" , "/",$board_member->image)}})"></div></a>
    <div class="info">
        <h1>{{ $board_member->$name }}</h1>
        <p>{{ $board_member->$position }}</p>
    </div>
</div>
