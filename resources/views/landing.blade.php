@extends('web.layouts.master')

@php
    $title = 'title' . '_' . app()->getLocale();
    $details = 'description' . '_' . app()->getLocale();
    $image = 'image' . '_' . app()->getLocale();
    $mobile_image = 'mobile_image' . '_' . app()->getLocale();
@endphp

@section('page_name') {{ __('lang.home') }} @endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/Home.css?v=2.7')}}">
@endsection

@section('content')

    <div id="slider">
        <div class="glide slider">
            <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
                @php
                    $Agent = new Jenssegers\Agent\Agent;
                @endphp
                @forelse ($slides as $index => $slide)
                    @if ($Agent->isDesktop() || $Agent->isTablet())
                        <li class="glide__slide">
                            <img src="{{ asset('storage/' . $slide->$image) }}" alt="image" width="100" height="100">
                            @if ($slide->route)
                                <div class="link">
                                    <a href="{{$slide->route}}">{{ __('lang.more') }}</a>
                                </div>
                            @endif
                        </li>
                    @else
                        <li class="glide__slide">
                            <img src="{{ asset('storage/' . $slide->$mobile_image) }}" alt="image" width="100" height="100">
                            @if ($slide->route)
                                <div class="link">
                                    <a href="{{$slide->route}}">{{ __('lang.more') }}</a>
                                </div>
                            @endif
                        </li>
                    @endif
                @empty
                @endforelse
            </ul>
            </div>
            <div class="glide__arrows" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><span>&#8592;</span></button>
                <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><span>&#8594;</span></button>
            </div>
            <div class="glide__bullets" data-glide-el="controls[nav]">
                @forelse ($slides as  $slide)
                <span class="glide__bullet" data-glide-dir="={{$slide->id - 1}}" title="bullet"></span>
                @empty
                @endforelse
            </div>
        </div>
    </div>

    <section id="about">
        <div class="title general">
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
            <h1 class="GeneralTitle">{{ __('web.aboutSanadTitle') }}</h1>
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        </div>
        <div class="description">
            <img src="{{asset('img/nav/sen-black.svg')}}" alt="sen-black" width="50" height="50">
            <p>{{ __('web.aboutSanadDescription') }}</p>
            <img src="{{asset('img/nav/dal-black.svg')}}" alt="dal-black" width="50" height="50">
        </div>

        <div class="sanadstory">
            <iframe class="story-video" src="https://www.youtube.com/embed/lNpo7sIex6s" width="450" height="300" name="sanadstory" title="sanadstory"
            allowfullscreen="allowfullscreen"
            mozallowfullscreen="mozallowfullscreen"
            msallowfullscreen="msallowfullscreen"
            oallowfullscreen="oallowfullscreen"
            webkitallowfullscreen="webkitallowfullscreen"
            frameBorder="0"></iframe>
        </div>
    </section>

    <section id="numbers">
        <div class="title">
            <h2>{{ __('lang.achievements') }}</h2>
            <a title="impact" href="/pages/impact">{{ __('lang.more') }}</a>
            <img class="persons-icons" src="{{asset('img/nav/persons-icons.svg')}}" alt="persons-icons" width="100" height="100">
        </div>
        <div class="glide slider-numbers">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    @forelse ($impact_numbers as $number)
                        <li class="glide__slide">
                            <img src="{{ asset('storage/' . $number->image) }}" alt="{{ $number->$title }}" width="100" height="100">
                            <span  class="counter">{{ $number->number }}</span>
                            <p>{{ $number->$title }}</p>
                        </li>
                    @empty
                    @endforelse
                </ul>
            </div>
            <div class="glide__arrows" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><span>&#8592;</span></button>
                <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><span>&#8594;</span></button>
            </div>
            <div class="glide__bullets" data-glide-el="controls[nav]">
                @forelse ($impact_numbers as $number)
                    <span class="glide__bullet" data-glide-dir="={{$number->id - 1}}" title="bullet"></span>
                @empty
                @endforelse
            </div>
        </div>
    </section>

    <div id="donation">
        <div class="description">
            <div class="title">
                <h2>{{ __('lang.support_programs') }}</h2>
            </div>
            <p>{{__('web.donationDescription')}}</p>
            <a title="donations" href="/pages/donations">{{ __('lang.more') }} </a>
            <img class="sen-with-image" src="{{asset('img/Home/sen-with-image.svg')}}" alt="sen-with-image" width="100" height="100">
        </div>
        <div class="photo">
            <img src="{{asset('img/Home/photo1.png')}}" alt="photo1" width="100" height="100">
        </div>
    </div>

    <section id="services">
        <div class="title general">
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
            <h2 class="GeneralTitle">{{ __('lang.our_services') }}</h2>
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        </div>
        {{-- <div class="types">
            @forelse ($services as $service)
                <div class="service service{{$service->id}}" style="--background: url(../storage/{{str_replace("\\" , "/",$service->image)}})">
                    <p>{{$service->$title}}</p>
                    <a title="services" href="/pages/services/{{$service->id}}">{{ __('lang.more') }}</a>
                </div>
            @empty
            @endforelse
        </div> --}}
        <div class="services">
            <img src="{{ asset('img/a1.jpeg') }}" alt="services" width="100" height="100">
            <p>{{ __('lang.services-details-home') }} <span style="color:#1EC0CA;">info@sanadorphans.org </span> </p>
        </div>
    </section>

    <section id="media">
        <div class="title">
            <h2>{{ __('lang.latest_news') }}</h2>
        </div>
        <div id="news">
            <div class="news">
            @forelse ($news as $new)
                <div class="new new{{$new->id}}">
                    <div class="image" style="--background: url(../storage/{{str_replace("\/" , "/",$new->image)}})"></div>
                    <a title="news" title="arrow" href="/pages/news/{{$new->id}}"><p>{{$new->$title}}</p></a>
                </div>
            @empty
            @endforelse
                <a title="more" class="more" href="/pages/news">{{ __('lang.more') }}</a>
            </div>
        </div>
    </section>

        {{-- <div class="content">
            <aside>
                <section id="Reports">
                    <section id="annuals">
                        <div class="title">
                            <h2>{{ __('lang.technical_reports') }}</h2>
                        </div>
                        <div class="annuals">
                            @if ($AnnualReport != null)
                                <div class="annual annual{{$AnnualReport->id}}" style="--background: url(../storage/{{str_replace("\\" , "/",$AnnualReport->image)}})">
                                    <h2>{{$AnnualReport->$title}}</h2>
                                    <a title="arrow" href="/storage/{{$AnnualReport->link}}">{{ __('lang.more') }}</a>
                                </div>
                                <a title="arrow" class="more" href="/pages/technical_reports">{{ __('lang.more') }} <img src="{{asset('img/nav/Arrow.svg')}}" alt="arrow" width="30px" height="30px"></a>
                            @endif
                        </div>
                    </section>
                    <section id="newsletters">
                        <div class="title">
                            <h2>{{ __('lang.periodical_newsletters') }}</h2>
                        </div>
                        <div class="newsletters">
                            @if ($NewsLetter != null)
                                <div class="newsletter newsletter{{$NewsLetter->id}}" style="--background: url(../storage/{{str_replace("\\" , "/",$NewsLetter->image)}})">
                                    <h2>{{$NewsLetter->$title}}</h2>
                                    <a title="arrow" href="/storage/{{$NewsLetter->link}}">{{ __('lang.more') }}</a>
                                </div>
                                <a title="arrow" class="more" href="/pages/periodical_newsletters">{{ __('lang.more') }} <img src="{{asset('img/nav/Arrow.svg')}}" alt="arrow" width="30px" height="30px"></a>
                            @endif
                        </div>
                    </section>
                    <section id="campagins">
                        <div class="title">
                            <h2>{{ __('lang.campaigns') }}</h2>
                        </div>
                        <div class="campagins">
                            @if ($Campaign != null)
                                <div class="campagin campagin{{$Campaign->id}}" style="--background: url(../storage/{{str_replace("\\" , "/",$Campaign->image)}})">
                                    <h2>{{$Campaign->$title}}</h2>
                                </div>
                                <a title="arrow" class="more" href="/pages/campaigns">{{ __('lang.more') }} <img src="{{asset('img/nav/Arrow.svg')}}" alt="arrow" width="30px" height="30px"></a>
                            @endif
                        </div>
                    </section>
                </section>
            </aside>
        </div> --}}


    <section id="Impacts">
        <div class="title general">
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
            <h2 class="GeneralTitle">{{ __('lang.stories') }}</h2>
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        </div>
        <div class="slider">
            <div class="glide AllImpacts">
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides">
                        @forelse ($stories as $story)
                            <li class="glide__slide">
                                <a title="story" href="{{ route('web.stories.show',$story->id) }}">
                                    <img alt="{{$story->$title}}" src="{{ asset('storage/' . $story->$image) }}">
                                    <p>{{$story->$title}}</p>
                                </a>
                            </li>
                        @empty
                        @endforelse
                    </ul>
                </div>
                <div class="glide__arrows" data-glide-el="controls">
                    <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><img src="{{asset('img/Home/blue-arrow.svg')}}" alt="blue-arrow" width="80px" height="80px"></button>
                    <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><img src="{{asset('img/Home/blue-arrow.svg')}}" alt="blue-arrow" width="80px" height="80px"></button>
                </div>
            </div>
        </div>
        <div class="moreStories">
            <a class="more" href="/pages/stories">{{ __('lang.more') }}</a>
        </div>
    </section>

    <section id="partners">
        <div class="title general">
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
            <h2 class="GeneralTitle">{{ __('lang.partners_list') }}</h2>
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        </div>
        <div class="glide partners">
            {{-- <span class="yellowCircle"></span> --}}
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    @forelse ($Partners as $Partner)
                            <li class="glide__slide"><img src="{{ asset('storage/' . $Partner->image) }}" alt="image" width="100" height="100"></li>
                    @empty
                    @endforelse
                </ul>
            </div>
            {{-- <span class="blueCircle"></span> --}}
            <div class="glide__arrows" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><img src="{{asset('img/Home/blue-arrow.svg')}}" alt="blue-arrow" width="80px" height="80px"></button>
                <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><img src="{{asset('img/Home/blue-arrow.svg')}}" alt="blue-arrow" width="80px" height="80px"></button>
            </div>
        </div>
    </section>

@endsection


@section('js')
    <script src="{{asset('js/Home.js?v=1.5')}}"></script>
@endsection
