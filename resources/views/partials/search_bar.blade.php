<form action="{{ route('search') }}" method="GET" class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" name="q" placeholder="{{__('lang.search')}}" aria-label="Search" value="{{ request('q') }}">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">{{__('lang.search')}}</button>
</form>
