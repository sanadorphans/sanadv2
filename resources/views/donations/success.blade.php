@extends('web.layouts.master')

@section('style')
<script>
  fbq('track', 'Purchase', {
    value: {{Donation Value}},
    currency: 'EGP'
  });
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
