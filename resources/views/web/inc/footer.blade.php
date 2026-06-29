
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
            <li style="color:white;"> {{ __('lang.protection_police') }} <a  href="https://sanadorphans.org/storage/link/protectionism.pdf" target="_blank">{{ __('lang.d_txt23') }}</a> </li>
            </ul>
        </div>
     </div>

    </div>

    <div class="section-map">
        <div class="fc">
            <div>
                <h4 class="en-only">{{ __('lang.our_services') }}</h4>
                    @forelse (\App\Models\Service::get() as $service)
                        <a href="{{ route('web.pages.services', $service->id) }}" >
                            <span>{{ $service->$title }}</span>
                        </a>
                    @empty
                    @endforelse
            </div>
             <div>
                <h4 class="en-only">{{ __('lang.Who We Are') }}</h4>
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
                <h4 class="en-only">{{ __('lang.media_center') }}</h4>
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
                <h4 class="en-only">{{ __('lang.our_programs') }}</h4>
                    @forelse (\App\Models\Program::get() as $program)
                        <a href="{{ route('web.pages.programs', $program->id) }}" >
                            <span>{{ $program->$title }}</span>
                        </a>
                    @empty
                    @endforelse
            </div>
        </div>
    </div>
    <div class="fb">
        <p class="en-only">© 2026 Sanad for Alternative Parental Care. All rights reserved.</p>
        <p class="ar-only" style="font-family:var(--font-ar)">© 2026 مؤسسة سند للرعاية الوالدية البديلة. جميع الحقوق محفوظة.</p>
        <p class="en-only">Privacy Policy · Terms of Use · Donation Return Policy</p>
        <p class="ar-only" style="font-family:var(--font-ar)">سياسة الخصوصية · شروط الاستخدام · سياسة استرداد التبرعات</p>
    </div>
</footer>

