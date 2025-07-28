@extends('web.layouts.master')

@php
    $donationValue = $donation->amount ?? 0;
    $donationId = $donation->id ?? null; // Or use a transaction/session ID
@endphp

@section('style')
<script>
    const donationValue = {{ $donationValue }};
    const donationId = {{ $donationId }};

    if (!donationId) {
        console.warn('No donation ID found. Skipping tracking.');
        localStorage.setItem('donationTracked', 'true'); // optional fallback
        window.donationValue = donationValue;
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
            'event': 'donationCompleted',
            'donationValue': donationValue
        });
        exit;
    }

    // Get already tracked donation IDs
    const trackedDonations = JSON.parse(localStorage.getItem('trackedDonations') || '[]');

    // Check if this donation ID has already been tracked
    if (trackedDonations.includes(donationId)) {
        console.log('This donation has already been tracked. Skipping pixels.', donationId);
    } else {
        // Track with Facebook Pixel


        // Save this donation ID as tracked
        trackedDonations.push(donationId);
        localStorage.setItem('trackedDonations', JSON.stringify(trackedDonations));
        console.log('Donation tracked:', donationValue);

        fbq('track', 'Purchase', {
            value: {{ $donationValue }},
            currency: 'EGP'
        });
        // Push to Google Tag Manager
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
            'event': 'donationCompleted',
            'donationValue': {{ $donationValue }}
        });
    }

    // Expose values globally if needed by other scripts
    window.donationValue = donationValue;
    window.donationId = donationId;
</script>
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



@endpush
