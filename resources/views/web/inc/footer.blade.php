
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
            </ul>
        </div>
     </div>

    <div class="newsletters">
        <h2>{{ __('lang.subscribe') }}</h2>
        <div id="mc_embed_signup">
            <form action="https://wataneya.us17.list-manage.com/subscribe/post?u=25ba645f10169963cf352dcf8&amp;id=8ebbd70fee&amp;f_id=00b245e0f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                 <div id="mc_embed_signup_scroll">
                     <div class="mc-field-group">
                         <label for="mce-MMERGE13"><span class="asterisk"></span></label>
                         <input type="text" value="" name="MMERGE13" class="required" id="mce-MMERGE13" required placeholder="{{__('lang.fullName')}}*">
                         <span id="mce-MMERGE13-HELPERTEXT" class="helper_text"></span>
                     </div>
                     <div class="mc-field-group">
                         <label for="mce-EMAIL"><span class="asterisk"></span>
                     </label>
                         <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" required placeholder="{{__('lang.email')}}*">
                         <span id="mce-EMAIL-HELPERTEXT" class="helper_text"></span>
                     </div>

                     <div class="mc-field-group">
                             <label for="mce-PHONE"><span class="asterisk"></span></label>
                             <input type="text" name="PHONE" class="required" value="" id="mce-PHONE" required placeholder="{{__('lang.phone')}}*">
                             <span id="mce-PHONE-HELPERTEXT" class="helper_text"></span>
                     </div>

                         <div class="mc-field-group">
                             <label for="mce-MMERGE7"><span class="asterisk"></span></label>
                             <input type="text" value="" name="MMERGE7" class="required" id="mce-MMERGE7" required placeholder="{{__('lang.organizationOrCompany')}}*">
                             <span id="mce-MMERGE7-HELPERTEXT" class="helper_text"></span>
                         </div>
                     </div>
         <div hidden="true"><input type="hidden" name="tags" value="6393289"></div>
             <div id="mce-responses" class="clear">
                 <div class="response" id="mce-error-response" style="display:none"></div>
                 <div class="response" id="mce-success-response" style="display:none"></div>
             </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
             <div style="position: absolute; left: -5000px; display:none;" aria-hidden="true"><input type="text" name="b_25ba645f10169963cf352dcf8_8ebbd70fee" tabindex="-1" value=""></div>
             <div class="clear" style="display:grid; justify-items:center;"><input type="submit" value="{{__('lang.join')}}" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
             </div>
         </form>
         </div>
         <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[4]='PHONE';ftypes[4]='phone';fnames[13]='MMERGE13';ftypes[13]='text';fnames[6]='MMERGE6';ftypes[6]='text';fnames[7]='MMERGE7';ftypes[7]='text';fnames[8]='MMERGE8';ftypes[8]='text';fnames[9]='MMERGE9';ftypes[9]='text';fnames[10]='MMERGE10';ftypes[10]='text';fnames[11]='MMERGE11';ftypes[11]='text';fnames[12]='MMERGE12';ftypes[12]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
         <!--End mc_embed_signup-->
    </div>

</footer>

<div id="copyRights">
    <p>{{ __('lang.copy_rights') }} <?php echo date("Y"); ?></p>
</div>

{{-- <div class="achieve">
    <h3>{{ __('lang.wataneya_is_working_to_achieve_goals') }}</h3>
    <ul class="achieve-goals-imgs">
        @if(app()->getLocale()=='ar')
            <li><img alt="achieve" src="{{ asset('/img/b1.png') }}" width="61" height="61"></li>
            <li><img alt="achieve" src="{{ asset('/img/b2.png') }}" width="61" height="61"></li>
            <li><img alt="achieve" src="{{ asset('/img/b3.png') }}" width="61" height="61"></li>
            <li><img alt="achieve" src="{{ asset('/img/b4.png') }}" width="61" height="61"></li>
            <li><img alt="achieve" src="{{ asset('/img/b5.png') }}" width="61" height="61"></li>
            <li><img alt="achieve" src="{{ asset('/img/b6.png') }}" width="61" height="61"></li>
            <li><img alt="achieve" src="{{ asset('/img/b7.png') }}" width="61" height="61"></li>
            <li><img alt="achieve" src="{{ asset('/img/b8.png') }}" width="61" height="61"></li>
        @else
            <li><img alt="achieve" src="{{ asset('/img/b1_en.png') }}" width="70" height="70"></li>
            <li><img alt="achieve" src="{{ asset('/img/b2_en.png') }}" width="70" height="70"></li>
            <li><img alt="achieve" src="{{ asset('/img/b3_en.png') }}" width="70" height="70"></li>
            <li><img alt="achieve" src="{{ asset('/img/b4_en.png') }}" width="70" height="70"></li>
            <li><img alt="achieve" src="{{ asset('/img/b5_en.png') }}" width="70" height="70"></li>
            <li><img alt="achieve" src="{{ asset('/img/b6_en.png') }}" width="70" height="70"></li>
            <li><img alt="achieve" src="{{ asset('/img/b7_en.png') }}" width="70" height="70"></li>
            <li><img alt="achieve" src="{{ asset('/img/b8_en.png') }}" width="70" height="70"></li>
        @endif
    </ul>
</div> --}}
