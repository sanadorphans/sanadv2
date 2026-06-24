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
    <link rel="stylesheet" href="{{asset('css/Home.css?v=2.5')}}">
    <link rel="stylesheet" href="{{asset('css/ImportantLink.css?v=1.5')}}"/>
@endsection

@section('content')

<section class="hero" id="home">
  <div class="hero-teal-accent"></div>
  <div class="hero-grid-pattern"></div>
  <div class="hero-orb1"></div>
  <div class="hero-orb2"></div>
  <div class="hero-inner">
    <div>
      <div class="hero-badge">
        <span class="badge-dot"></span>
        <span>{{ __('lang.hero_badge') }}</span>
      </div>
      <h1 class="hero-h1">
        @if(app()->getLocale() == 'ar')
          <span style="font-family:var(--font-ar); direction:rtl;">{!! __('lang.hero_title') !!}</span>
        @else
          <span>{!! __('lang.hero_title') !!}</span>
        @endif
      </h1>
      <p class="hero-sub" style="{{ app()->getLocale() == 'ar' ? 'font-family:var(--font-ar); direction:rtl; text-align:right;' : '' }}">
        {{ __('lang.hero_subtitle') }}
      </p>
      <div class="hero-btns">
        <a href="#donate" class="btn-teal">{{ __('lang.our_services') }} <span class="en-only">→</span><span class="ar-only">←</span></a>
        <a href="#programs" class="btn-outline-w">{{ __('lang.consultation2') }} <span class="en-only">→</span><span class="ar-only">←</span></a>
      </div>
    </div>

    <div class="hero-right">
      <div class="donate-grid">
        <div class="dform">
          <span class="flabel" style="{{ app()->getLocale() == 'ar' ? 'font-family:var(--font-ar);' : '' }}">
            {{ __('lang.i_want_to_support') }}
          </span>

          <div class="dtype-wrap" style="{{ app()->getLocale() == 'ar' ? 'font-family:var(--font-ar);' : '' }}">
            <div class="dtyp active" onclick="setD(this)">{{ __('lang.children_development') }}</div>
            <div class="dtyp" onclick="setD(this)">{{ __('lang.youth_empowerment') }}</div>
            <div class="dtyp" onclick="setD(this)">{{ __('lang.caregiver_training_btn') }}</div>
            <div class="dtyp" onclick="setD(this)">{{ __('lang.general_donation') }}</div>
          </div>

          <span class="flabel" style="{{ app()->getLocale() == 'ar' ? 'font-family:var(--font-ar);' : '' }}">
            {{ __('lang.select_amount') }}
          </span>

          <div class="amounts-wrap">
            <div class="abtn" onclick="setA(this,'150')">
              150 EGP
              <small style="{{ app()->getLocale() == 'ar' ? 'font-family:var(--font-ar);' : '' }}">{{ __('lang.amt_school_supplies') }}</small>
            </div>

            <div class="abtn active" onclick="setA(this,'500')">
              500 EGP
              <small style="{{ app()->getLocale() == 'ar' ? 'font-family:var(--font-ar);' : '' }}">{{ __('lang.amt_psychosocial') }}</small>
            </div>

            <div class="abtn" onclick="setA(this,'1000')">
              1,000 EGP
              <small style="{{ app()->getLocale() == 'ar' ? 'font-family:var(--font-ar);' : '' }}">{{ __('lang.amt_caregiver') }}</small>
            </div>

            <div class="abtn" onclick="setA(this,'2500')">
              2,500 EGP
              <small style="{{ app()->getLocale() == 'ar' ? 'font-family:var(--font-ar);' : '' }}">{{ __('lang.amt_monthly_care') }}</small>
            </div>

            <div class="abtn" onclick="setA(this,'5000')">
              5,000 EGP
              <small style="{{ app()->getLocale() == 'ar' ? 'font-family:var(--font-ar);' : '' }}">{{ __('lang.amt_full_program') }}</small>
            </div>

            <div class="abtn" onclick="setA(this,'custom')">
              ✏️
              <small style="{{ app()->getLocale() == 'ar' ? 'font-family:var(--font-ar);' : '' }}">{{ __('lang.amt_custom') }}</small>
            </div>
          </div>

          <div class="custom-wrap" id="cWrap" style="display:none;">
            <input type="number" placeholder="{{ __('lang.custom_placeholder') }}" min="150">
          </div>

          <div class="frow">
            <div class="ff">
              <label style="{{ app()->getLocale() == 'ar' ? 'font-family:var(--font-ar);' : '' }}">{{ __('lang.full_name') }}</label>
              <input name="name" type="text" id="name"  placeholder="{{ __('lang.name_placeholder') }}" required>

            </div>

            <div class="ff">
              <label style="{{ app()->getLocale() == 'ar' ? 'font-family:var(--font-ar);' : '' }}">{{ __('lang.country') }}</label>
              <input name="country" type="country" id="country" placeholder="{{ __('lang.country_placeholder') }}" required>

            </div>

            <div class="ff">
              <label style="{{ app()->getLocale() == 'ar' ? 'font-family:var(--font-ar);' : '' }}">{{ __('lang.email_address') }}</label>
              <input type="email" placeholder="{{ __('lang.email_placeholder') }}" name="email" id="email" required>
            </div>

            <button class="donate-submit" style="{{ app()->getLocale() == 'ar' ? 'font-family:var(--font-ar);' : '' }}">
              {{ __('lang.donate_now') }}
            </button>

            <div class="pay-row">
                <div class="sec-txt" style="{{ app()->getLocale() == 'ar' ? 'font-family:var(--font-ar);' : '' }}">
                🔒 <span>{{ __('lang.secured') }}</span>
              </div>
              <div class="pbadge">VISA</div>
              <div class="pbadge">Mastercard</div>
              <div class="pbadge">CIB</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="hero-wave">
    <svg viewBox="0 0 1440 60" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="width:100%;display:block;">
      <path d="M0,30 C360,60 1080,0 1440,30 L1440,60 L0,60 Z" fill="#29B8C1" opacity="0.15"/>
      <path d="M0,40 C480,10 960,60 1440,40 L1440,60 L0,60 Z" fill="#29B8C1" opacity="0.08"/>
    </svg>
  </div>
</section>
<section class="trusted-by">
  <h3>Trusted by</h3>
  <div class="logos">
    <div class="logo-track">
        @forelse ($Partners as $Partner)
            <img src="{{ asset('storage/' . $Partner->image) }}" alt="image" width="100" height="100">
        @empty
        @endforelse
    </div>
  </div>
</section>

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
                {{-- <p>{{ __('lang.about_text2') }}</p>
                <p>{{ __('lang.about_text3') }}</p> --}}
            </div>
         </div>
    </section>

    <section id="media">
        <div class="title">
            <h2>{{ __('lang.latest_news') }}</h2>
        </div>
        <div id="news">
            {{-- <div class="glide news">
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides">
                        @forelse ($news as $new)
                            <div class="new new{{$new->id}}">
                                <li class="glide__slide"><div class="image" style="--background: url(../storage/{{str_replace("\\" , "/",$new->image)}})"></div></li>
                                <li class="glide__slide"><a title="news" title="arrow" href="/pages/news/{{$new->id}}"><p>{{$new->$title}}</p></a></li>
                                <li class="glide__slide"><p>{{ app()->getLocale() == 'ar' ? to_arabic_number(date('F Y', strtotime($new->created_at))) : $new->created_at->formatLocalized('%B %Y') }}</p></li>
                            </div>
                        @empty
                        @endforelse
                    </ul>
                </div>
                <div class="glide__arrows" data-glide-el="controls">
                    <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><img src="{{asset('img/Home/blue-arrow.svg')}}" alt="blue-arrow" width="80px" height="80px"></button>
                    <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><img src="{{asset('img/Home/blue-arrow.svg')}}" alt="blue-arrow" width="80px" height="80px"></button>
                </div>
            </div>
        </div> --}}

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

    </section>

    <section id="qoutation">
        <div class="title general">
            <h2 class="GeneralTitle">{{ __('lang.we_Aspire') }}</h2>
        </div>
        <div class="qoutation">
            <p class="qoutation_text">{{ __('lang.Home_qou') }}</p>
        </div>
    </section>


    {{-- <section id="services">
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
    </section> --}}

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
    <script src="{{asset('js/Home.js?v=1.6')}}"></script>
@endsection

