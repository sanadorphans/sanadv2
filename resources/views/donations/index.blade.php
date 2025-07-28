@extends('web.layouts.master')

@php
    $title = 'title' . '_' . app()->getLocale();
    $details = 'details' . '_' . app()->getLocale();
@endphp

@section('page_name') {{ __('lang.donation_to') }} @endsection

@section('style')
<link rel="stylesheet" href="{{ asset('css/Donation.css?v=1.3') }}">
@endsection

@section('content')
    @include('web.inc.map')
    {{-- v2 --}}
    <section id="whyDonation">
        <div class="text-donate">
            <div class="title-donate">
                <h1>{{$cms_content[0]->$title }}</h1>
                <img src="{{ asset('img/6224893fe9e13.png') }}" alt="faq" width="50px" height="50px">
            </div>
            <p>{{$cms_content[0]->$details }}</p>
            <a class="call-action" href="{{ route('web.pages.impact') }}">{{ __('lang.learn_more_about_donation') }}</a>
        </div>
        <div class="slider">
            <div>
                <div class="slider-photos">
                    <div class="mySlides fade">
                        <img src="{{ asset('storage/' . $cms_content[1]->image) }}" alt="img2" width="100%" height="100%">
                    </div>
                    <div class="mySlides fade">
                        <img src="{{ asset('storage/' . $cms_content[2]->image) }}" alt="img2" width="100%" height="100%">
                    </div>
                </div>
            </div>
            <div class="direction">
                <img src="{{ asset('img/Home/blue-arrow.svg') }}" alt="left arrow" width="80" height="80"
                    onclick="plusSlides(-1)">
                <a class="call-action" href="#Donation" class="smooth-scroll">{{ __('lang.donate_to') }}</a>
                <img src="{{ asset('img/Home/blue-arrow.svg') }}" alt="right arrow" width="80" height="80"
                    onclick="plusSlides(1)">
            </div>
        </div>
    </section>
    <!--second section -->
    <section id="Fatwa">
        <div class="title-donate">
            <h1>{{ $cms_content[3]->$title }}</h1>
            <img src="{{ asset('img/6224893f9ccea.png') }}" alt="faq" width="50px" height="50px">
        </div>
        <img src="{{ asset('storage/' . $cms_content[3]->image) }}" alt="dar-elaifita" width="326" height="300">
        <p>{{$cms_content[3]->$details }}</p>
    </section>
    <!--third section -->
    <section id="All-Fatwas">
        <div class="frist-fatwa fatwa">
            <div class="title-donate">
                <h1>{{ $cms_content[4]->$title }}</h1>
            </div>
            <p>{{ $cms_content[4]->$details }}</p>
            <a class="call-action" href="{{ $cms_content[4]->link }}">{{ __('lang.read_fatwa') }}</a>
        </div>
        <div class="secand-fatwa fatwa">
            <div class="title-donate">
                <h1>{{ $cms_content[5]->$title }}</h1>
            </div>
            <p>{{ $cms_content[5]->$details }}</p>
            <a class="call-action" href="{{ $cms_content[5]->link }}">{{ __('lang.read_fatwas') }}</a>
        </div>
    </section>
    <!--fourth section -->
    <section id="Donation">
        <div class="title-donate">
            <h1>{{ __('lang.donation_to') }}</h1>
            <img src="{{ asset('img/622489401ba19.png') }}" alt="healthcare" width="50px" height="50px">
        </div>
        <form id="donation">
            @csrf
            <div>
                <label for="type">{{ __('lang.d_txt5') }}</label>
                <select name="type" id="type">
                    <option value="{{ __('lang.d_txt9') }}" selected>{{ __('lang.d_txt9') }}</option>
                    <option value="{{ __('lang.d_txt6') }}">{{ __('lang.d_txt6') }}</option>
                    <option value="{{ __('lang.d_txt7') }}">{{ __('lang.d_txt7') }}</option>
                    <option value="{{ __('lang.d_txt8') }}">{{ __('lang.d_txt8') }}</option>
                </select>
            </div>

            <div>
                <label for="name">{{ __('lang.d_txt11') }}</label>
                <input name="name" type="text" id="name">
            </div>

            <div>
                <label for="phone_number">{{ __('lang.d_txt12') }}</label>
                <input name="phone_number" type="text" id="phone_number">
            </div>


            <div>
                <label for="email">{{ __('lang.d_txt13') }}</label>
                <input name="email" type="text" id="email">
            </div>

            <div>
                <label for="amount">{{ __('lang.d_txt14') }}</label>
                <div class="amount">
                    <input
                        name="amount"
                        type="number"
                        id="amount"
                        min="50"
                        value=""
                        required
                        oninput="validateAmount(this)"
                    >
                    <span>{{ __('lang.d_txt15') }}</span>
                </div>
            </div>
            <div>
                <label for="donation_ad">{{ __('lang.donation_question') }}</label>
                <select name="donation_ad" id="donation_ad">
                    <option value="{{ __('lang.donation_answer1') }}">{{ __('lang.donation_answer1') }}</option>
                    <option value="{{ __('lang.donation_answer2') }}">{{ __('lang.donation_answer2') }}</option>
                    <option value="{{ __('lang.donation_answer3') }}">{{ __('lang.donation_answer3') }}</option>
                    <option value="{{ __('lang.donation_answer4') }}">{{ __('lang.donation_answer4') }}</option>
                    <option value="{{ __('lang.donation_answer5') }}">{{ __('lang.donation_answer5') }}</option>
                    <option value="{{ __('lang.donation_answer6') }}">{{ __('lang.donation_answer6') }}</option>
                </select>
            </div>

            <button class="donate-btn" type="submit">{{ __('lang.d_txt16') }}</button>
        </form>
    </section>


    <!--fifth section -->
    <section id="AtherDonationWay">
        <div class="title-donate">
            <h1>{{ __('lang.Other_ways_of_donation') }}</h1>
            <img src="{{ asset('img/622489401ba19.png') }}" alt="healthcare" width="50px" height="50px">
        </div>
        <div class="All-Donation-Ways">
            @forelse ($banks as $bank)
            <div class="frist-way way">
                <img src="{{ asset('storage/' . $bank->image) }}" alt="CIB" width="100%" height="78">
                <p class="call-action-btn">{{ $bank->$details }}</p>
            </div>
            @empty

            @endforelse
        </div>
    </section>

    <!--sixth section -->
    <section id="RecoveryMoney">
        <div class="title-donate">
            <h1>{{$return_policy->$title }}</h1>
            <img src="{{ asset('img/6224893fd3911.png') }}" alt="cashback" width="50px" height="50px">
        </div>
        <div class="Money-Back">
            <p>{{ $return_policy->$details }}</p>
            <p>{{ __('lang.Kindly_understand_that') }}</p>
            <div class="conditions">
                <span></span>
                <p>{{ __('lang.frist_condition') }}</p>
            </div>
            <div class="conditions">
                <span></span>
                <p>{{ __('lang.second_condition') }}</p>
            </div>
            <a class="call-action" href="#footer">{{ __('lang.contact_to') }}</a>
        </div>
    </section>
<script src="{{ asset('js/Donation.js?v=1.1') }}"></script>
@endsection

@push('scripts')
    <script>
    function validateAmount(input) {
        const value = parseFloat(input.value);

        // If empty or invalid, set to minimum
        if (isNaN(value) || value < 50) {
            input.value = 50;
        }
    }
    </script>
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
        $("#donation").on("submit", function (e) {
            e.preventDefault()
            document.querySelector(".donate-btn").disabled = true;
            document.querySelector(".donate-btn").style.backgroundColor = "#ccc";
            document.querySelector(".donate-btn").innerText = "{{ __('lang.wait') }}";
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


        })
    </script>
@endpush
