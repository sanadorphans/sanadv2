@extends('web.layouts.master')

@php
    $title = 'title' . '_' . app()->getLocale();
    $details = 'description' . '_' . app()->getLocale();
    $image = 'image' . '_' . app()->getLocale();
    $mobile_image = 'mobile_image' . '_' . app()->getLocale();
    $details2 = 'details' . '_' . app()->getLocale();

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
    <link rel="stylesheet" href="{{asset('css/Home.css?v=2.7')}}">
    <link rel="stylesheet" href="{{asset('css/ImportantLink.css?v=1.5')}}"/>
    <link rel="stylesheet" href="{{asset('css/Impact.css?v=2.2')}}">
@endsection

@section('content')

<div class="hero" id="home">
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
        <a href="{{ route('targetaudience') }}" class="btn-teal">{{ __('lang.our_services') }} {{ __('lang.arrow_dir') }}</a>
        <a href="https://sanadorphans.org/en/pages/sub-services/37" class="btn-outline-w">{{ __('lang.consultation2') }} {{ __('lang.arrow_dir') }}</a>
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
</div>

<section class="trusted-by">
  <h3>{{ __('lang.trusted-by') }}</h3>
  <div class="logos">
    <div class="logo-track">
        @forelse ($Partners as $Partner)
            <img src="{{ asset('storage/' . $Partner->image) }}" alt="image" width="100" height="100">
        @empty
        @endforelse
    </div>
  </div>
</section>
<!-- ══ CHALLENGE / MISSION ══ -->
<section class="challenge-section" id="about">
  <div class="si">
    <div class="stag"><span class="stag-line"></span><span>{{ __('lang.challenge_tag') }}</span></div>
    <h2 class="sh2">{!! __('lang.challenge_h2') !!}</h2>
    <div class="challenge-grid">
      <div>
        <div class="c-stat">
          <div class="c-num">{{ __('lang.aboutnum1') }}</div>
          <div class="c-body">
            <h4>{{ __('lang.aboutnumdes1') }}</h4>
            <p>{{ __('lang.aboutp1') }}</p>
          </div>
        </div>
        <div class="c-stat">
          <div class="c-num">{{ __('lang.aboutnum2') }}</div>
          <div class="c-body">
            <h4>{{ __('lang.aboutnumdes2') }}</h4>
            <p>{{ __('lang.aboutp2') }}</p>
          </div>
        </div>
        <div class="c-stat">
          <div class="c-num">{{ __('lang.aboutnum3') }}</div>
          <div class="c-body">
            <h4>{{ __('lang.aboutnumdes3') }}</h4>
            <p>{{ __('lang.aboutp3') }}</p>
          </div>
        </div>
        <!-- <a href="#programs" style="display:inline-flex;align-items:center;gap:6px;color:var(--teal-dark);font-weight:700;font-size:14px;text-decoration:none;margin-top:0.5rem;border-bottom:1px solid var(--teal-mid);padding-bottom:1px;">
          <span class="en-only">See how Sanad responds →</span>
          <span class="ar-only" style="font-family:var(--font-ar)">← اكتشف كيف تستجيب سند</span>
        </a> -->
      </div>
      <div class="mission-visual-box">
        <div class="mv-card">
          <h3>{{ __('lang.approach_h3') }}</h3>
          <p>{{ __('lang.approach_p') }}</p>
          <div class="mv-mini-stats">
              @forelse ($impact_numbers as $number)
                  <div class="mv-mini"><strong>{{ $number->number }}</strong><span>{{ $number->$title }}</span></div>
              @empty
              @endforelse
          </div>
        </div>
        <div class="mv-float">
          <strong>18+</strong>
          <span>{{ __('lang.years_of_impact') }}</span>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ══ stories ══ -->
<section class="challenge-section" id="about">
  <div class="si">
    <div class="stag"><span class="stag-line"></span><span>{{ __('lang.stories') }}</span></div>
    <h2 class="sh2 en-only">{!! isset($StoriesCategory->$details2) ? $StoriesCategory->$details2 : '' !!}</h2>
    <div id="Impacts">
        <div class="slider">
            <div class="glide AllImpacts">
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides">
                        @forelse ($StoriesCategory->Story as $story)
                            <li class="glide__slide">
                                <a href="{{ route('web.stories.show',$story->id) }}">
                                    <img alt="{{$story->$title}}" src="{{ asset('storage/' . $story->$image) }}">
                                    <h1>{{$story->$title}}</h1>
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
    </div>

  </div>
</section>

<!-- ══ PROGRAMS ══ -->
<section id="programs" style="background:var(--off-white);">
  <div class="si">
    <div class="stag"><span class="stag-line"></span><span>{{ __('lang.what_we_do') }}</span></div>
    <h2 class="sh2">{{ __('lang.three_pillars') }}</h2>
    <p class="ssub">{{ __('lang.programs_sub') }}</p>
    <div class="prog-grid" style="margin-top:3rem;">
    @forelse ($programs as $program)
      <div class="prog-card">
        <div class="prog-icon">
            @if ($program->id == 1)
              <img src="https://sanadorphans.org/storage/link/Home.png" alt="icon" width="100px">
            @elseif($program->id == 2)
              <img src="https://sanadorphans.org/storage/link/Shield.png" alt="icon" width="100px">
            @else
              <img src="https://sanadorphans.org/storage/link/Justice%20balance%20scales%20symbol%20for%20law%20and%20fairness.png" alt="icon" width="100px">
            @endif
        </div>
        <div class="prog-num">{{ $program->id }}</div>
        <h3>{{ $program->$title }}</h3>
        <p>{{ __('lang.program_p') }}</p>
        <div class="prog-tags">
                @forelse($program->sub_programs as $sub_program)
                    <a class="ptag" href="{{ route('web.pages.sub_Programs',$sub_program->id) }}">{{ $sub_program->$title }}</a>
                @empty
                    <div class="alert alert-info">{{ __('lang.no_data') }}</div>
                @endforelse
        </div>
        <a href="{{ route('web.pages.programs', $program->id) }}" class="prog-lnk">{{ __('lang.learn_more') }}</a>
      </div>
    @empty
    @endforelse
    </div>
  </div>
</section>

<!-- ══ NEWS ══ -->
<section class="news-section" id="news">
  <div class="si">
    <div class="news-hdr">
      <div>
        <div class="stag"><span class="stag-line"></span><span>{{ __('lang.latest_news_tag') }}</span></div>
        <h2 class="sh2" style="margin-bottom:0;">{{ __('lang.from_the_field') }}</h2>
      </div>
      <a href="/pages/news" class="news-all">{{ __('lang.view_all_news') }}</a>
    </div>
    <div class="ng">

         @forelse ($news as $new)
                <div class="ncard">
                  <div class="nimg" style="background: url(../storage/{{str_replace("\\" , "/",$new->image)}})">
                  <!-- <div class="nimg-badge en-only">Program Update</div><div class="nimg-badge ar-only" style="font-family:var(--font-ar)">تحديث البرنامج</div> -->
                </div>
                  <div class="nbody">
                    <div class="ndate">{{ app()->getLocale() == 'ar' ? to_arabic_number(date('F Y', strtotime($new->created_at))) : $new->created_at->formatLocalized('%B %Y') }}</div>
                    <h4>{{$new->$title}}</h4>
                    <a href="/pages/news/{{$new->id}}" class="nread">{{ __('lang.more') }} {{ __('lang.arrow_dir') }}</a>
                  </div>
                </div>
          @empty
          @endforelse
    </div>
  </div>
</section>

<!-- ══ GET INVOLVED ══ -->
<section class="involve-section">
  <div class="inv-header">
    <div class="stag" style="justify-content:center;color:var(--teal);"><span class="stag-line" style="background:var(--teal);"></span><span>{{ __('lang.get_involved_tag') }}</span></div>
    <h2 class="sh2" style="color:white;text-align:center;">{{ __('lang.get_involved_h2') }}</h2>
    <p class="ssub" style="color:rgba(255,255,255,0.6);margin:0.5rem auto 0;text-align:center;">{{ __('lang.get_involved_p') }}</p>
  </div>
  <div class="inv-grid">
    <div class="icard">
      <div class="icard-icon">❤️</div>
      <h3>{{ __('lang.donate_h3') }}</h3>
      <p>{{ __('lang.donate_p') }}</p>
      <a href="{{ route('web.donations.index') }}" class="ibtn">{{ __('lang.donate_btn') }}</a>
    </div>
    <div class="icard">
      <div class="icard-icon">🙋</div>
      <h3>{{ __('lang.volunteer_h3') }}</h3>
      <p>{{ __('lang.volunteer_p') }}</p>
      <a href="#" class="ibtn">{{ __('lang.apply_volunteer') }}</a>
    </div>
    <div class="icard">
      <div class="icard-icon">🤝</div>
      <h3>{{ __('lang.partner_h3') }}</h3>
      <p>{{ __('lang.partner_p') }}</p>
      <a href="#" class="ibtn">{{ __('lang.explore_partnership') }}</a>
    </div>
  </div>
</section>

@endsection


@section('js')
    <script src="{{asset('js/Home.js?v=1.6')}}"></script>
        <script src="{{asset('js/Stories.js?v=1.2')}}"></script>
@endsection

