

@php
    $lang = app()->getLocale() == 'ar' ? 'EN' : 'العربية';
    $language = app()->getLocale() == 'ar' ? 'en' : 'ar';

    $title = 'title' . '_' . app()->getLocale();
    $details =  'details' . '_' . app()->getLocale();
@endphp


    <div id="Topbar">
        <div class="contactUs">
            <ul>
                @forelse ($socials as $social)
                    <li class="social-icons hidden-xs hidden-sm">
                        <a href="{{$social->social_link}}" target="_blank" title="{{$social->social_key}}">
                            <img src="/storage/{{$social->social_icon}}" alt="{{$social->social_key}}">
                        </a>
                    </li>
                @empty

                @endforelse
                    <li class="phone-link"><a href="#footer">{{ __('lang.contact_us') }}</a></li>
            </ul>
        </div>
        {{-- <p>{{ __('lang.slogan') }}</p> --}}
        <a href="{{ str_replace([env('APP_URL') . '/' . 'ar', env('APP_URL') . '/' . 'en'], env('APP_URL') . '/' . $language, url()->full()) }}"
            style="color: white;font-weight:bold">{{ $lang }}</a>
</div>

    <nav>
        <a class="navbar-brand" href="{{ route('landing') }}" rel="tooltip" data-placement="bottom" target="_self">
            <img  width="120" height="auto"
            src="/storage/{{app()->getLocale() == 'ar' ?
            Voyager::setting('site.logo',asset('img/logo-ar.png')) :
            Voyager::setting('site.logo_en',asset('img/logo-en.png')) }}"
            alt={{app()->getLocale() == 'ar' ?
            Voyager::setting('site.title', __('lang.sanad')) :
            Voyager::setting('site.title_en', __('lang.sanad'))}}
            >
        </a>
        <img class="navbar-toggler" src="{{asset('img/nav/burger-menu.svg')}}" alt="urger-menu" width="40" height="40" onclick="toggleNavActive()">

        <div class="navbar-nav navbar-nav-hover">
            <img class="deactive" src="{{asset('img/nav/remove.svg')}}" alt="deactive" width="30" height="30" onclick="toggleNavActive()">
            <ul>
                <li class="navItem " onclick="toggleActiveClass(this)">
                    <a class="navLink" href="#">
                        <span >{{ __('lang.about') }}</span>
                        <span class="bg-blue"></span>
                        <img src="{{ asset('land2/assets/img/down-arrow-dark.svg') }}" alt="down-arrow" class="arrow">
                    </a>
                    <div class="dropdownMenu">
                            <a href="{{ route('web.pages.who_we_are') }}">
                                <span>{{ __('lang.Who We Are') }}</span>
                            </a>
                            <a href="{{ route('web.board.index') }}">
                                <span>{{ __('lang.board_members') }}</span>
                            </a>
                            <a href="{{ route('web.team_members.index') }}">
                                <span>{{ __('lang.staff') }}</span>
                            </a>
                            <a href="{{ route('web.pages.certificates') }}">
                                <span>{{ __('lang.awards') }}</span>
                            </a>
                            <a href="{{ route('web.pages.impact') }}">
                                <span>{{ __('lang.impact') }}</span>
                            </a>
                            <a href="{{ route('web.pages.alliances') }}">
                                <span>{{ __('lang.Alliances') }}</span>
                            </a>
                            {{-- <a href="{{ route('web.pages.Accreditation ') }}">
                                <span>{{ __('lang.Accreditation ') }}</span>
                            </a> --}}
                            <a href="{{ route('web.pages.vacancies') }}">
                                <span>{{ __('lang.join_wataneya') }}</span>
                            </a>

                    </div>
                </li>
                <li class="navItem" onclick="toggleActiveClass(this)">
                    <a class="navLink" href="{{ route('web.pages.services', 1) }}">
                            <span >{{ __('lang.our_services') }}</span>
                            <span class="bg-blue"></span>
                            {{-- <img src="{{ asset('land2/assets/img/down-arrow-dark.svg') }}" alt="down-arrow" class="arrow"> --}}
                    </a>
                    {{-- <div class="dropdownMenu">
                            @forelse (\App\Models\Service::get() as $service)
                                <a href="{{ route('web.pages.services', $service->id) }}" >
                                    <span>{{ $service->$title }}</span>
                                </a>
                            @empty
                            @endforelse
                    </div> --}}
                </li>
                <li class="navItem " onclick="toggleActiveClass(this)">
                    <a class="navLink" href="#">
                        <span >{{ __('lang.media_center') }}</span>
                        <span class="bg-blue"></span>
                        <img src="{{ asset('land2/assets/img/down-arrow-dark.svg') }}" alt="down-arrow" class="arrow">
                    </a>
                    <div class="dropdownMenu">
                            <a href="{{ route('web.news.index') }}">
                                <span>{{ __('lang.news') }}</span>
                            </a>
                            <a href="{{ route('web.pages.campaigns') }}">
                                <span>{{ __('lang.campaigns') }}</span>
                            </a>
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
                </li>

                <li class="navItem" onclick="toggleActiveClass(this)">
                    <a class="navLink" href="#" >
                        <span>{{ __('lang.our_partners') }}</span>
                        <span class="bg-blue"></span>
                        <img src="{{ asset('land2/assets/img/down-arrow-dark.svg') }}" alt="down-arrow" class="arrow">
                    </a>
                    <div class="dropdownMenu">
                            @forelse ($PartnersTypes as $partnerType)
                                <a href="{{ route('web.pages.partners', $partnerType->id) }}">
                                    <span>{{ $partnerType->$title }}</span>
                                </a>
                            @empty
                            @endforelse
                    </div>
                </li>
            </ul>
            <div class="buttons">
                    <a href="{{ route('web.donations.index') }}">{{ __('lang.donate_now') }}</a>
                 @if (!Auth::user())
                    {{-- <a href="{{ route('login') }}">{{ __('lang.get_our_services') }}</a> --}}
                @else
                <ul>
                    <li class="navItem" onclick="toggleActiveClass(this)">
                        <a class="navLink" href="#">
                            <span>{{ Auth::user()->name }}</span>
                            <span class="bg-blue"></span>
                            <img src="{{ asset('land2/assets/img/down-arrow-dark.svg') }}" alt="down-arrow" class="arrow">
                        </a>
                        <div class="dropdownMenu">
                            <a href="{{ route('dashboard') }}">
                                <span>{{ __('lang.profile') }}</span>
                            </a>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit">
                                    {{ __('lang.logout') }}
                                </button>
                            </form>
                        </div>
                    </li>
                </ul>
                @endif
            </div>
        </div>
    </nav>





