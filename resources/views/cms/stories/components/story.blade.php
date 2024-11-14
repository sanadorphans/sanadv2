<a href="{{ route('web.stories.show',$story->id) }}" class="col-xs-12 remove-padding news-item">
    <div class="img-frame">
        <img src="{{ asset('storage/' . $story->image) }}" alt="{{ $story->name }}">
    </div>
    <div class="col-xs-12 d-flex justify-content-center">
        @if (LaravelLocalization::getCurrentLocale() == 'ar')
            <h4 class="my-4" style="font-size: 16px">{{ $story->name }}</h4>
        @else
            <h4 class="my-4" style="font-size: 16px">{{ $story->name_en }}</h4>
        @endif
    </div>
</a>
