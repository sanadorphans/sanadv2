@extends('web.layouts.master')

@php
    $title = 'title' . '_' . app()->getLocale();
    $details = 'description' . '_' . app()->getLocale();
    $image = 'image' . '_' . app()->getLocale();
    $mobile_image = 'mobile_image' . '_' . app()->getLocale();

    if (!function_exists('to_arabic_number')) {
        function to_arabic_number($Month) {
            $Month = str_replace("1", "۱", $Month);
            $Month = str_replace("2", "۲", $Month);
            $Month = str_replace("3", "۳", $Month);
            $Month = str_replace("4", "٤", $Month);
            $Month = str_replace("5", "٥", $Month);
            $Month = str_replace("6", "٦", $Month);
            $Month = str_replace("7", "۷", $Month);
            $Month = str_replace("8", "۸", $Month);
            $Month = str_replace("9", "۹", $Month);
            $Month = str_replace("0", "۰", $Month);
            $Month = str_replace("January", "يناير", $Month);
            $Month = str_replace("February", "فبراير", $Month);
            $Month = str_replace("March", "مارس", $Month);
            $Month = str_replace("April", "أبريل", $Month);
            $Month = str_replace("May", "مايو", $Month);
            $Month = str_replace("June", "يونيو", $Month);
            $Month = str_replace("July", "يليو", $Month);
            $Month = str_replace("August", "أغسطس", $Month);
            $Month = str_replace("September", "سبتمبر", $Month);
            $Month = str_replace("October", "أكتوبر", $Month);
            $Month = str_replace("November", "نوفمبر", $Month);
            $Month = str_replace("December", "ديسمبر", $Month);
            return $Month;
        }
    }

@endphp

@section('page_name') {{ __('lang.home') }} @endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/Home.css?v=2.2')}}">
    <link rel="stylesheet" href="{{asset('css/ImportantLink.css?v=1.5')}}"/>
@endsection

@section('content')

    {{-- <div id="popup">
       <a href="https://conference.sanadorphans.org/ar/home-ar/"><img src="https://conference.sanadorphans.org/wp-content/uploads/2024/12/sanad-confrence-Poster-1-0%D9%A2-1024x550.jpg" alt="conference" width="300"></a>
    </div> --}}
    <div class="buttons-botton">
        <a href="{{ route('web.donations.index') }}">{{ __('lang.donate_now') }}</a>
    </div>
    <div class="fullscreen-video-container">
        <iframe src="https://www.youtube.com/embed/lNpo7sIex6s?si=oxXJ9-_wct4JbPTa" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        <div class="fullscreen-video-content">
            <h1>{{ __('lang.vision') }}</h1>
            <button> <a style="color:#fff" href="{{ route('web.pages.who_we_are') }}">{{ __('lang.more') }}</a></button>
        </div>
    </div>

    <section id="about">
         <h2>{{ __('lang.aboutTitle') }}</h2>
         <div class="about">
            <div class="aboutNums">
                <div>
                    <h3>{{ __('lang.aboutnum1') }}</h3>
                    <p>{{ __('lang.aboutnumdes1') }}</p>
                </div>
                <div>
                    <h3>{{ __('lang.aboutnum2') }}</h3>
                    <p>{{ __('lang.aboutnumdes2') }}</p>
                </div>
                <div>
                    <h3>{{ __('lang.aboutnum3') }}</h3>
                    <p>{{ __('lang.aboutnumdes3') }}</p>
                </div>
            </div>
            <div class="aboutdes">
                <p>{{ __('lang.about_text1') }}</p>
                <p>{{ __('lang.about_text2') }}</p>
                <p>{{ __('lang.about_text3') }}</p>
            </div>
         </div>
    </section>

    <section id="qoutation">
        <div class="title general">
            <h2 class="GeneralTitle">{{ __('lang.we_Aspire') }}</h2>
        </div>
        <div class="qoutation">
            <p class="qoutation_text">{{ __('lang.Home_qou') }}</p>
        </div>
    </section>

    <section id="services">
        <div class="title general">
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
            <h2 class="GeneralTitle">{{ __('lang.our_services') }}</h2>
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        </div>
      <div class="types">
            @forelse ($services as $service)
                <div class="service service{{$service->id}}" style="--background: url(../storage/{{str_replace("\\" , "/",$service->image)}})">
                    <p>{{$service->$title}}</p>
                    <a title="services" href="/pages/services/{{$service->id}}">{{ __('lang.more') }}</a>
                </div>
            @empty
            @endforelse
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
                    <span class="glide__bullet" data-glide-dir="{{$number->id - 1}}" title="bullet"></span>
                @empty
                @endforelse
            </div>
        </div>
    </section>

    {{-- <section id="Links">
        <div class="title general">
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
            <h2 class="GeneralTitle">{{ __('lang.important links') }}</h2>
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        </div>
        <div class="Links">
            @forelse ($ImportantLinks as $ImportantLink)
                <div class="Link Link{{$ImportantLink->id}}">
                    <a href="{{$ImportantLink->link}}">
                        <div class="image" style="--background: url('../storage/{{ str_replace('\\', '/', $ImportantLink->image) }}')"></div>
                        <p>{{$ImportantLink->$title}}</p>
                    </a>
                </div>
            @empty
            @endforelse
        </div>
        <div class="moreLinks">
            <a class="more" href="{{route('web.pages.ImportantLinks.index')}}">{{ __('lang.more') }}</a>
        </div>
    </section> --}}

    <section id="Accreditation">
        <div class="title general">
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
            <h2 class="GeneralTitle">{{ __('lang.Accreditation and Awards') }}</h2>
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        </div>
        <div class="AllAccreditation">
            <div class="Accreditation">
                <img src="{{ asset('/img/Accreditation/E7dMxSow70rkm5QfJ5C0 1.png') }}" alt="Accreditation" width="50px" height="50px">
                <div>
                    <p>{{ __('lang.pearson_Accreditation') }}</p>
                    <p>{{ __('lang.pearson_Accreditation2') }}</p>
                </div>
            </div>
            <div class="Accreditation">
                <div class="logos">
                    <img src="{{ asset('/img/Accreditation/6Q56Ocp7IhA1PcQrdXVN.png') }}" alt="Accreditation" width="50px" height="50px">
                    <img src="{{ asset('/img/Accreditation/original.png') }}" alt="Accreditation" width="50px" height="50px">
                </div>
                <p>{{ __('lang.PWC_Accreditation') }}</p>
            </div>
        </div>
        <div class="moreAwards">
            <a class="more" href="/pages/awards">{{ __('lang.our_awards') }}</a>
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
                    <div class="image" style="--background: url(../storage/{{str_replace("\\" , "/",$new->image)}})"></div>
                    <a title="news" title="arrow" href="/pages/news/{{$new->id}}"><p>{{$new->$title}}</p></a>
                    <p>{{ app()->getLocale() == 'ar' ? to_arabic_number(date('F Y', strtotime($new->created_at))) : $new->created_at->formatLocalized('%B %Y') }}</p>
                </div>
            @empty
            @endforelse
                <a title="more" class="more" href="/pages/news">{{ __('lang.more') }}</a>
            </div>
        </div>
    </section>

    <section id="partners">
        <div class="title general">
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
            <h2 class="GeneralTitle">{{ __('lang.partners_list') }}</h2>
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        </div>
        <div class="glide partners">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    @forelse ($Partners as $Partner)
                            <li class="glide__slide"><img src="{{ asset('storage/' . $Partner->image) }}" alt="image" width="100" height="100"></li>
                    @empty
                    @endforelse
                </ul>
            </div>
            <div class="glide__arrows" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><img src="{{asset('img/Home/blue-arrow.svg')}}" alt="blue-arrow" width="80px" height="80px"></button>
                <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><img src="{{asset('img/Home/blue-arrow.svg')}}" alt="blue-arrow" width="80px" height="80px"></button>
            </div>
        </div>
        <div class="moreAwards">
            <a title="more" class="more" href="/pages/partners">{{ __('lang.more') }}</a>
        </div>
    </section>

@endsection


@section('js')
    <script src="{{asset('js/Home.js?v=1.5')}}"></script>
@endsection

