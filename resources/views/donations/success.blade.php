@extends('web.layouts.master')

@section('pixel')
    <!-- Meta Pixel Code -->
    <script>

    !function(f,b,e,v,n,t,s)

    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?

    n.callMethod.apply(n,arguments):n.queue.push(arguments)};

    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';

    n.queue=[];t=b.createElement(e);t.async=!0;

    t.src=v;s=b.getElementsByTagName(e)[0];

    s.parentNode.insertBefore(t,s)}(window, document,'script',

    'https://connect.facebook.net/en_US/fbevents.js');

    fbq('init', '187745878913077');

    fbq('track', 'PageView');

    </script>

    <noscript><img height="1" width="1" style="display:none"

    src="https://www.facebook.com/tr?id=187745878913077&ev=PageView&noscript=1"

    /></noscript>

    <!-- End Meta Pixel Code -->

@endsection

@section('content')
    <div class="success">
        <div class="thank img">
            <img src="{{ asset('/img/heart.png') }}" alt="">
        </div>
        <div class="text">

            @if(app()->getLocale() == 'ar')


                <h1> السيد/ة  {{$donation->name}} </h1>

                <p>
                    شكراً لدعمكم...
                </p> <p>
                    تبرعكم بقيمة   {{$donation->amount}}  جنيهاً يسهم في مهمتنا ورسالتنا من أجل كل يتيم.
                </p><p>
                    تحياتنا،
                </p><p>
                    فريق سند
                </p>

            @else
                <h1>
                    Thank you for your support, {{$donation->name}}.
                </h1>
                <p>
                Your donation with the amount of {{$donation->amount}}  EGP contributes directly to our mission
                </p> <p>

                for every orphan.

                </p> <p>


                Best regards,
                </p> <p>

                Sanad team
                </p>

            @endif

        </div>
        <p>{{ __('lang.toShowAnneulReport') }} <a href="https://sanadorphans.org/storage/annual-report/February2024/k7UdPMar0vqnILHkr5wa.pdf" target="blank">{{ __('lang.report_2023_2024') }}</a></p>
        <br>
        <a href="/">{{__('lang.home')}}</a>
    </div>
@endsection

@push('scripts')

    <script> 

    // Try to get the first <span> inside the confirmation text block 

    const amountSpan = document.querySelector('.text p span'); 

    

    // Extract and clean the number 

    const donationAmount = amountSpan ? parseFloat(amountSpan.textContent.replace(/[^\d.]/g, '')) : 0; 

    

    // Fire Purchase event with dynamic value and EGP currency 

    fbq('track', 'Purchase', { 

        value: donationAmount, 

        currency: 'EGP' 

    }); 

    </script> 

@endpush
