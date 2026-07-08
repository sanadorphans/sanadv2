
<?php
    $socials = App\Models\SocialMedia::get();
    $PartnersTypes = App\Models\PartnerType::get();

?>

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
    <link rel="stylesheet" href="{{asset('css/Home.css?v=2.8')}}">
    <link rel="stylesheet" href="{{asset('css/ImportantLink.css?v=1.5')}}"/>
    <link rel="stylesheet" href="{{asset('css/Impact.css?v=2.2')}}">
    <style>
        section {
            padding: 5.5rem 2rem;
        }
        /* ══ FOOTER ══ */
footer{background:#061828;padding:4.5rem 2rem 2.5rem;}
.fg{max-width:1160px;margin:0 auto;display:grid;grid-template-columns:2fr 1fr 1fr 1fr;gap:3.5rem;margin-bottom:3.5rem;}
[dir="rtl"] .fg{direction:rtl;}
.fbrand p{font-size:13px;color:rgba(255,255,255,0.42);line-height:1.8;margin-top:1rem;max-width:240px;}
.f-logo{display:flex;align-items:center;gap:11px;}
.f-logo .logo-name{color:white;}
.f-logo .logo-sub{color:rgba(255,255,255,0.35);}
.freg{display:inline-flex;align-items:center;gap:6px;background:rgba(41,184,193,0.08);border:1px solid rgba(41,184,193,0.15);border-radius:7px;padding:6px 12px;font-size:11px;color:rgba(255,255,255,0.4);margin-top:1.25rem;}
.fc h4{font-size:16px;font-weight:800;letter-spacing:0.1em;text-transform:uppercase;color:rgba(255,255,255,0.3);margin-bottom:1.125rem;}
.fc a{display:block;font-size:14px;color:rgba(255,255,255,0.52);text-decoration:none;margin-bottom:8px;transition:color 0.15s;}
.fc a:hover{color:white;}
.fb{max-width:1160px;margin:0 auto;border-top:1px solid rgba(255,255,255,0.07);padding-top:2rem;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:1rem;}
.fb p{font-size:12px;color:rgba(255,255,255,0.25);}
.socials{display:flex;gap:10px;}
.soc{width:36px;height:36px;border-radius:9px;background:rgba(255,255,255,0.06);display:flex;align-items:center;justify-content:center;color:rgba(255,255,255,0.5);text-decoration:none;font-size:13px;font-weight:700;transition:all 0.2s;}
.soc:hover{background:rgba(41,184,193,0.2);color:var(--teal);}
.section-map {display: flex; flex-direction: column; width: 100%;}
.footer-columns {display: flex; justify-content: space-evenly; width: 100%;}

/* Footer subscribe section styling */
.footer-subscribe {
    width: 100%;
    margin-top: 2rem;
    padding: 0 4.5rem;
}
[dir="rtl"] .footer-subscribe {
    text-align: right;
}
.footer-subscribe h4 {
    font-size: 16px;
    font-weight: 800;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: #ffffff;
    margin-bottom: 1.125rem;
    font-family: 'Cairo', sans-serif;
}
.footer-subscribe-form {
    display: flex;
    gap: 15px;
    align-items: center;
    width: 100%;
    flex-wrap: wrap;
}
.footer-subscribe-form input[type="email"] {
    background-color: #d1d5db; /* Light grey background */
    border: none;
    border-radius: 12px;
    padding: 12px 20px;
    font-size: 0.95rem;
    color: #1f2937;
    outline: none;
    flex: 1;
    min-width: 200px;
    max-width: 350px;
    height: 48px;
    font-family: 'Cairo', sans-serif;
}
.footer-subscribe-form input[type="email"]::placeholder {
    color: #6b7280;
}
.footer-subscribe-form .btn-subscribe {
    background-color: #1ec1ca; /* Teal color matching design */
    color: #ffffff;
    border: none;
    border-radius: 12px;
    padding: 12px 28px;
    font-weight: 700;
    font-size: 0.95rem;
    cursor: pointer;
    transition: all 0.2s ease-in-out;
    height: 48px;
    font-family: 'Cairo', sans-serif;
}
.footer-subscribe-form .btn-subscribe:hover {
    background-color: #179ea5;
    transform: translateY(-1px);
}
.footer-subscribe-form .btn-donate-now {
    background-color: #f37246; /* Coral orange color matching brand */
    color: #ffffff;
    border: none;
    border-radius: 12px;
    padding: 12px 28px;
    font-weight: 700;
    font-size: 0.95rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease-in-out;
    height: 48px;
    font-family: 'Cairo', sans-serif;
}
.footer-subscribe-form .btn-donate-now:hover {
    background-color: #d95e34;
    transform: translateY(-1px);
}

@media (max-width: 800px) {
    .footer-columns {
        flex-direction: column;
    }
    .footer-subscribe {
        padding: 0 10px;
        text-align: center;
    }
    [dir="rtl"] .footer-subscribe {
        text-align: center;
    }
    .footer-subscribe-form {
        justify-content: center;
    }
    .footer-subscribe-form input[type="email"] {
        max-width: 100%;
        width: 100%;
    }
}
#footer:nth-of-type(2){
    display: none !important;
}
#copyRights{
    display: none !important;
}
form{
  width: 100%;
}
.ff {
    margin-bottom: 0;
}

form div {
    justify-items: start;
}
form .pay-row {
    justify-items: center;
}
.ff input, .ff select {
    padding: 8px 15px;
}

form div input {
    padding: 0.5vw;
    margin: 0.5vw 0;
}
.donate-submit {
    font-size: 14px !important;
    padding: 12px !important;
}
        /* Hero Video Background Styles */
        .hero {
            position: relative;
            background: #0A2533; /* fallback navy background */
        }
        .hero-video-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            overflow: hidden;
            pointer-events: none;
        }
        .hero-video-bg iframe {
            position: absolute;
            top: 50%;
            left: 50%;
            /* Scale up so YouTube's control bar/title are outside the clipped container */
            width: 125%;
            height: 125%;
            transform: translate(-50%, -50%);
            pointer-events: none;
            border: none;
            z-index: 0;
        }
        .hero-video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(10, 37, 51, 0.35); /* lighter overlay – video shows through, white text stays readable */
            z-index: 1;
        }

        /* ── Play Button ── */
        .hero-play-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgba(255,255,255,0.12);
            border: 1.5px solid rgba(255,255,255,0.3);
            border-radius: 100px;
            padding: 10px 22px 10px 14px;
            color: white;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.25s;
            backdrop-filter: blur(6px);
            text-decoration: none;
            margin-top: 0.5rem;
        }
        .hero-play-btn:hover {
            background: rgba(255,255,255,0.22);
            border-color: rgba(255,255,255,0.55);
            transform: scale(1.04);
        }
        .hero-play-icon {
            width: 36px;
            height: 36px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }
        .hero-play-icon svg {
            width: 14px;
            height: 14px;
            fill: #0A2533;
            margin-left: 2px;
        }

        /* ── Video Modal ── */
        #videoModal {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 9999;
            background: rgba(0,0,0,0.88);
            align-items: center;
            justify-content: center;
            animation: fadeInModal 0.25s ease;
        }
        #videoModal.open {
            display: flex;
        }
        @keyframes fadeInModal {
            from { opacity: 0; }
            to   { opacity: 1; }
        }
        .vm-inner {
            position: relative;
            width: 90vw;
            max-width: 960px;
            aspect-ratio: 16/9;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 32px 80px rgba(0,0,0,0.6);
        }
        .vm-inner iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
        .vm-close {
            position: absolute;
            top: -44px;
            right: 0;
            background: rgba(255,255,255,0.1);
            border: 1.5px solid rgba(255,255,255,0.25);
            border-radius: 50%;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: white;
            font-size: 18px;
            line-height: 1;
            transition: background 0.2s;
        }
        .vm-close:hover { background: rgba(255,255,255,0.22); }

        /* ── News Glide ── */
        .news-glide {
            width: 80%;
            margin: auto;
            position: relative;
        }
        .news-glide .glide__track {
            margin: auto;
        }
        .news-glide .glide__arrow {
            padding: 0;
            background-color: transparent;
            border: 0 solid rgba(255,255,255,0.5);
            box-shadow: 0 0 0 0 rgba(0,0,0,0.1);
            text-shadow: 0 0 0 0 rgba(0,0,0,0.1);
            cursor: pointer;
        }
        .news-glide .glide__arrow--left {
            -webkit-transform: rotate(270deg) translate(50%,0);
            transform: rotate(270deg) translate(50%,0);
            left: -4.5em;
            z-index: 5;
            position: absolute;
            top: 50%;
        }
        .news-glide .glide__arrow--right {
            -webkit-transform: rotate(90deg) translate(-50%,0);
            transform: rotate(90deg) translate(-50%,0);
            right: -4.5em;
            z-index: 5;
            position: absolute;
            top: 50%;
        }
        .news-glide .glide__arrow img {
            width: 6vw;
            height: auto;
        }
        @media (max-width: 800px) {
            .news-glide {
                width: 100%;
            }
            .news-glide .glide__arrow img {
                width: 50px;
            }
            .news-glide .glide__arrow--left {
                -webkit-transform: rotate(270deg) translate(120%,0);
                transform: rotate(270deg) translate(120%,0);
                left: -0.2em;
            }
            .news-glide .glide__arrow--right {
                -webkit-transform: rotate(90deg) translate(-120%,0);
                transform: rotate(90deg) translate(-120%,0);
                right: -0.2em;
            }
        }
    </style>
@endsection

@section('content')

<div class="hero" id="home">
  <div class="hero-video-bg">
    <iframe src="https://www.youtube.com/embed/lNpo7sIex6s?si=oxXJ9-_wct4JbPTa&autoplay=1&mute=1&loop=1&playlist=lNpo7sIex6s&controls=0&playsinline=1&rel=0&enablejsapi=1&modestbranding=1&disablekb=1&fs=0&iv_load_policy=3" 
            frameborder="0" 
            allow="autoplay; encrypted-media" 
            allowfullscreen>
    </iframe>
    <div class="hero-video-overlay"></div>
  </div>
  <div class="hero-teal-accent"></div>
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
      <button class="hero-play-btn" id="heroPlayBtn" onclick="openVideoModal()">
        <span class="hero-play-icon">
          <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><polygon points="4,2 14,8 4,14"/></svg>
        </span>
        <span>{{ app()->getLocale() == 'ar' ? 'شاهد الفيديو' : 'Watch Video' }}</span>
      </button>
    </div>

    <div class="hero-right">
      <div class="donate-grid">
        <div class="dform">
          <span class="flabel" style="{{ app()->getLocale() == 'ar' ? 'font-family:var(--font-ar);' : '' }}">
            {{ __('lang.i_want_to_support') }}
          </span>

          <div class="dtype-wrap" style="{{ app()->getLocale() == 'ar' ? 'font-family:var(--font-ar);' : '' }}">
            <div class="dtyp active" data-value="{{ __('lang.d_txt9') }}" onclick="setD(this)">{{ __('lang.children_development') }}</div>
            <div class="dtyp" data-value="{{ __('lang.d_txt6') }}" onclick="setD(this)">{{ __('lang.youth_empowerment') }}</div>
            <div class="dtyp" data-value="{{ __('lang.d_txt7') }}" onclick="setD(this)">{{ __('lang.caregiver_training_btn') }}</div>
            <div class="dtyp" data-value="{{ __('lang.d_txt8') }}" onclick="setD(this)">{{ __('lang.general_donation') }}</div>
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
            <input type="number" id="custom_amount_input" placeholder="{{ __('lang.custom_placeholder') }}" min="150" oninput="updateCustomAmount(this.value)">
          </div>

        <form id="donation2">
            @csrf
            <input type="hidden" name="type" id="donation_type" value="{{ __('lang.d_txt9') }}">
            <input type="hidden" name="amount" id="donation_amount" value="500">
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

            <button type="submit" class="donate-submit" style="{{ app()->getLocale() == 'ar' ? 'font-family:var(--font-ar);' : '' }}">
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
        </form>
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

<!-- ══ VIDEO MODAL ══ -->
<div id="videoModal" onclick="handleModalClick(event)">
  <div class="vm-inner">
    <div class="vm-close" onclick="closeVideoModal()">&#x2715;</div>
    <iframe id="modalVideoIframe"
      src=""
      allow="autoplay; encrypted-media; fullscreen"
      allowfullscreen>
    </iframe>
  </div>
</div>

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
    <div class="slider" style="width: 100%; margin: 2vw 0;">
      <div class="glide news-glide">
        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides">
             @forelse ($news as $new)
                <li class="glide__slide">
                  <div class="ncard" style="margin: 10px; background: white; height: 100%;">
                    <div class="nimg" style="background: url(../storage/{{str_replace("\\" , "/",$new->image)}});background-size: cover; background-position: center; height: 230px;">
                    </div>
                    <div class="nbody" style="padding: 1.5rem;">
                      <div class="ndate" style="font-size: 12px; color: var(--muted); margin-bottom: 0.5rem;">{{ app()->getLocale() == 'ar' ? to_arabic_number(date('F Y', strtotime($new->created_at))) : $new->created_at->formatLocalized('%B %Y') }}</div>
                      <h4 style="font-size: 16px; font-weight: 700; margin-bottom: 1rem; line-height: 1.4; min-height: 48px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{$new->$title}}</h4>
                      <a href="/pages/news/{{$new->id}}" class="nread" style="font-size: 13px; color: var(--teal); font-weight: bold; text-decoration: none; display: inline-flex; align-items: center; gap: 5px;">{{ __('lang.more') }} {{ __('lang.arrow_dir') }}</a>
                    </div>
                  </div>
                </li>
             @empty
             @endforelse
          </ul>
        </div>
        <div class="glide__arrows" data-glide-el="controls">
          <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><img src="{{asset('img/Home/blue-arrow.svg')}}" alt="blue-arrow"></button>
          <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><img src="{{asset('img/Home/blue-arrow.svg')}}" alt="blue-arrow"></button>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="trusted-by">
  <div class="si">
    <h3 class="trusted-title">{{ __('lang.trusted-by') }}</h3>
    <div class="logos-marquee">
      <div class="marquee-track" id="partnerMarquee">
          @forelse ($Partners as $Partner)
              <div class="marquee-item">
                  <img src="{{ asset('storage/' . $Partner->image) }}" alt="partner logo">
              </div>
          @empty
          @endforelse
      </div>
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
      <a href="https://forms.office.com/r/ky00KxTAu0" class="ibtn">{{ __('lang.apply_volunteer') }}</a>
    </div>
    <div class="icard">
      <div class="icard-icon">🤝</div>
      <h3>{{ __('lang.partner_h3') }}</h3>
      <p>{{ __('lang.partner_p') }}</p>
      <a href="#" class="ibtn">{{ __('lang.explore_partnership') }}</a>
    </div>
  </div>
</section>

<footer id="footer">
     <div class="brand">
        <img src="{{asset('img/footer/sanad-slogn-off.svg')}}" alt="sanad-slogn-off" width="40%">
        <h2>{{ __('lang.join_social') }}</h2>
        <div class="contactUs">
            <ul>
                @forelse ($socials as $social)
                    <li class="social-icons">
                        <a href="{{$social->social_link}}" target="_blank" title="{{$social->social_key}}">
                            <img src="/storage/{{$social->social_icon}}" alt="{{$social->social_key}}" width="20" height="auto">
                        </a>
                    </li>
                @empty

                @endforelse
            </ul>
            <h2>{{__('lang.contactInfo')}}</h2>
            <ul class="support">
                <li style="color:white;"><i class="fa-solid fa-phone fa-shake"
                        style="--fa-animation-duration: 3s;"></i> {{ __('lang.home_phone_wataneya') }} </li>
                <li style="color:white;"><i class="fa-solid fa-mobile fa-shake"
                        style="--fa-animation-duration: 3s;"></i> {{ __('lang.phone_number_wataneya') }} </li>
                <li style="color:white;"><i class="fa-solid fa-envelope fa-bounce"
                        style="--fa-animation-duration: 3s;"></i> info@sanadorphans.org </li>
                <li style="color:white;"><i class="fa-solid fa-map-location-dot fa-bounce"
                        style="--fa-animation-duration: 3s;"></i><a href="https://www.google.co.uk/maps/place/%D8%AC%D9%85%D8%B9%D9%8A%D8%A9+%D9%88%D8%B7%D9%86%D9%8A%D8%A9+%D9%84%D8%AA%D9%86%D9%85%D9%8A%D8%A9+%D9%88%D8%AA%D8%B7%D9%88%D9%8A%D8%B1+%D8%AF%D9%88%D8%B1+%D8%A7%D9%84%D8%A3%D9%8A%D8%AA%D8%A7%D9%85%E2%80%AD/@30.086658,31.3289431,15z/data=!4m5!3m4!1s0x0:0x7728f47eab7d5044!8m2!3d30.086658!4d31.3289431?hl=ar&shorturl=1">{{ __('lang.address_wataneya') }}</a></li>
            <div class="freg">✓ <span class="en-only">{{ __('lang.Advertisement_number') }}  </span></div>
            <!-- <li style="color:white;"> {{ __('lang.protection_police') }} <a  href="https://sanadorphans.org/storage/link/protectionism.pdf" target="_blank">{{ __('lang.d_txt23') }}</a> </li> -->
            </ul>
        </div>
     </div>

    </div>

    <div class="section-map">
        <div class="footer-columns">
            <div class="fc">
                <div>
                    <h4>{{ __('lang.our_services') }}</h4>
                        @forelse (\App\Models\Service::get() as $service)
                            <a href="{{ route('web.pages.services', $service->id) }}" >
                                <span>{{ $service->$title }}</span>
                            </a>
                        @empty
                        @endforelse
                </div>
                 <div>
                    <h4>{{ __('lang.Who We Are') }}</h4>
                    <a href="{{ route('web.pages.who_we_are') }}">
                        <span>{{ __('lang.about') }}</span>
                    </a>
                    <a href="{{ route('web.board.index') }}">
                        <span>{{ __('lang.board_members') }}</span>
                    </a>
                    <a href="{{ route('web.team_members.index') }}">
                        <span>{{ __('lang.staff') }}</span>
                    </a>
                    <a href="{{ route('web.pages.partners') }}">
                        <span>{{ __('lang.Partners_Network') }}</span>
                    </a>
                    <a href="{{ route('web.pages.certificates') }}">
                        <span>{{ __('lang.awards') }}</span>
                    </a>
                </div>
            </div>
            <div class="fc">
                <div>
                    <h4>{{ __('lang.media_center') }}</h4>
                    <a href="#">
                        <span>{{ __('lang.Photos_and_videos') }}</span>
                    </a>
                    <a href="{{ route('web.news.index') }}">
                        <span>{{ __('lang.news') }}</span>
                    </a>
                    <a href="{{ route('web.PressRelease.index') }}">
                        <span>{{ __('lang.Press_Releases') }}</span>
                    </a>
                    {{-- <a href="{{ route('web.pages.campaigns') }}">
                        <span>{{ __('lang.campaigns') }}</span>
                    </a> --}}
                    {{-- <a href="{{ route('web.pages.events') }}">
                        <span>{{ __('lang.events') }}</span>
                    </a> --}}
                    {{-- <a href="{{ route('web.pages.media_bags') }}">
                        <span>{{ __('lang.media_kit') }}</span>
                    </a> --}}
                    <a href="{{ route('web.pages.technical_reports') }}">
                        <span>{{ __('lang.technical_reports') }}</span>
                    </a>
                    <a href="{{ route('web.pages.periodical_newsletters') }}">
                        <span>{{ __('lang.periodical_newsletters') }}</span>
                    </a>
                </div>
                 <div>
                    <h4>{{ __('lang.our_programs') }}</h4>
                        @forelse (\App\Models\Program::get() as $program)
                            <a href="{{ route('web.pages.programs', $program->id) }}" >
                                <span>{{ $program->$title }}</span>
                            </a>
                        @empty
                        @endforelse
                </div>
                  <div>
                    <h4>{{ __('lang.Knowledge creation') }}</h4>
                            <a href="{{ route('web.article.index') }}" >
                                <span>{{ __('lang.articles') }}</span>
                            </a>
                        <a href="{{ route('web.pages.technical_reports') }}">
                                    <span>{{ __('lang.technical_reports') }}</span>
                                </a>
                </div>
            </div>
        </div>

        <div class="footer-subscribe">
            <h4>{{ __('lang.subscribe_for_newsletters') }}</h4>
            <div class="footer-subscribe-form">
                <input type="email" placeholder="{{ __('lang.email_placeholder') }}" required>
                <button type="button" class="btn-subscribe">{{ __('lang.subscribe_btn') }}</button>
                <a href="{{ route('web.donations.index') }}" class="btn-donate-now">{{ __('lang.donate_now') }}</a>
            </div>
        </div>
    </div>
    <!-- <div class="fb">
        <p class="en-only">© 2026 Sanad for Alternative Parental Care. All rights reserved.</p>
        <p class="ar-only" style="font-family:var(--font-ar)">© 2026 مؤسسة سند للرعاية الوالدية البديلة. جميع الحقوق محفوظة.</p>
        <p class="en-only">Privacy Policy · Terms of Use · Donation Return Policy</p>
        <p class="ar-only" style="font-family:var(--font-ar)">سياسة الخصوصية · شروط الاستخدام · سياسة استرداد التبرعات</p>
    </div> -->
</footer>


@endsection


@section('js')
@push('scripts')

    <script src="https://cibpaynow.gateway.mastercard.com/checkout/version/61/checkout.js" data-error="errorCallback"
            data-cancel="cancelCallback"></script>

    <script type="text/javascript">

        function errorCallback(error) {

            console.log(JSON.stringify(error));

        }

        function cancelCallback() {

            console.log('Payment cancelled');

        }

    </script>

    <script>
        // Redefine setD to also update the hidden 'type' input in the form
        window.setD = function(el) {
            document.querySelectorAll('.dtyp').forEach(b => b.classList.remove('active'));
            el.classList.add('active');
            
            var val = el.getAttribute('data-value');
            var input = document.getElementById('donation_type');
            if (input) {
                input.value = val;
            }
        };

        // Redefine setA to update the hidden 'amount' input and handle custom amount toggle
        window.setA = function(el, v) {
            document.querySelectorAll('.abtn').forEach(b => b.classList.remove('active'));
            el.classList.add('active');
            
            var cWrap = document.getElementById('cWrap');
            var customInput = document.getElementById('custom_amount_input');
            var donationAmount = document.getElementById('donation_amount');
            
            if (v === 'custom') {
                cWrap.style.display = 'block';
                if (donationAmount && customInput) {
                    donationAmount.value = customInput.value;
                }
            } else {
                cWrap.style.display = 'none';
                if (donationAmount) {
                    donationAmount.value = v;
                }
            }
        };

        // Keep donation_amount hidden field updated when custom amount changes
        window.updateCustomAmount = function(val) {
            var donationAmount = document.getElementById('donation_amount');
            if (donationAmount) {
                donationAmount.value = val;
            }
        };

        $("#donation2").on("submit", function (e) {
            e.preventDefault()
            document.querySelector(".donate-submit").disabled = true;
            document.querySelector(".donate-submit").style.backgroundColor = "#ccc";
            document.querySelector(".donate-submit").innerText = "{{ __('lang.wait') }}";
            var form = $(this);
            var url = "{{route('web.donations.createSession')}}";

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function(data)
                {
                    console.log(data.status); // show response from the php script.

                   if(data.status){
                    Checkout.configure({

                        session: {

                            id: data.session

                        },

                        interaction: {

                            merchant: {

                                name:'Sanad For Alternative Parental Care',

                                address: {

                                    line1: ' 3 Al Bairouny St. - Baron Palace - Heliopolis - Cairo',
                                }

                            }

                        }

                    });
                    Checkout.showPaymentPage();

                }
                }
            });


        });

        function resizeHeroVideo() {
            const hero = document.getElementById('home');
            const iframe = document.querySelector('.hero-video-bg iframe');
            if (!hero || !iframe) return;

            const w = hero.offsetWidth;
            const h = hero.offsetHeight;
            const videoRatio = 16 / 9;
            const containerRatio = w / h;

            if (containerRatio > videoRatio) {
                iframe.style.width = w + 'px';
                iframe.style.height = (w / videoRatio) + 'px';
            } else {
                iframe.style.width = (h * videoRatio) + 'px';
                iframe.style.height = h + 'px';
            }
        }

        window.addEventListener('resize', resizeHeroVideo);
        document.addEventListener('DOMContentLoaded', function() {
            resizeHeroVideo();
            if (document.querySelector('.news-glide')) {
                new Glide('.news-glide', {
                    type: 'carousel',
                    startAt: 0,
                    autoplay: 4000,
                    perView: 4,
                    gap: 20,
                    breakpoints: {
                        1200: {
                            perView: 3
                        },
                        800: {
                            perView: 1
                        }
                    }
                }).mount();
            }
            // Setup infinite scrolling marquee for partners
            const marqueeTrack = document.getElementById('partnerMarquee');
            if (marqueeTrack) {
                const marqueeItems = Array.from(marqueeTrack.children);
                marqueeItems.forEach(item => {
                    const clone = item.cloneNode(true);
                    marqueeTrack.appendChild(clone);
                });
                marqueeItems.forEach(item => {
                    const clone = item.cloneNode(true);
                    marqueeTrack.appendChild(clone);
                });
            }
        });
        window.addEventListener('load', resizeHeroVideo);

        // ── Video Modal ──
        var VIDEO_URL = 'https://www.youtube.com/embed/lNpo7sIex6s?autoplay=1&mute=0&controls=1&rel=0&enablejsapi=1';

        function openVideoModal() {
            var modal = document.getElementById('videoModal');
            var iframe = document.getElementById('modalVideoIframe');
            iframe.src = VIDEO_URL;
            modal.classList.add('open');
            document.body.style.overflow = 'hidden';
        }

        function closeVideoModal() {
            var modal = document.getElementById('videoModal');
            var iframe = document.getElementById('modalVideoIframe');
            modal.classList.remove('open');
            iframe.src = ''; // stop video on close
            document.body.style.overflow = '';
        }

        function handleModalClick(e) {
            if (e.target === document.getElementById('videoModal')) {
                closeVideoModal();
            }
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeVideoModal();
        });
    </script>
@endpush

    <script src="{{asset('js/Home.js?v=1.6')}}"></script>
        <script src="{{asset('js/Stories.js?v=1.2')}}"></script>
@endsection

