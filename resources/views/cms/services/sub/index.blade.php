@extends('web.layouts.master')

@php
    $title = 'title' . '_' . app()->getLocale();
    $details = 'details' . '_' . app()->getLocale();
    $target = 'target' . '_' . app()->getLocale();

@endphp

@section('page_name')
    {{ $sub_service ? $sub_service->$title :  '' }}
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/Service.css?v=1.7')}}"/>
        <link rel="stylesheet" href="{{asset('css/Impact.css?v=2.3')}}">
@endsection

@section('content')

    <header id="header" data-content="{{ $sub_service->$title }}" style="--background: url(../storage/{{str_replace("\\" , "/",$sub_service->image)}})">
        <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        <h1 class="GeneralTitle">{{ $sub_service->$title }}</h1>
        <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
    </header>

    @include('web.inc.map')
    @if ($sub_service->$details != "")
        <section id="service">
            <div class="service">
                <div class="details">
                    <p>{!! $sub_service->$details !!}</p>
                    {{-- <div class="target">
                        <h1>{{__('lang.targeted_groups')}}</h1>
                        <p>{!! $sub_service->$target !!}</p>
                        @if (!empty(json_decode($sub_service->file)))
                            <a href="/storage/{{json_decode($sub_service->file)[0]->download_link}}">{{ __('lang.more') }}</a>
                        @endif
                    </div> --}}
                    @if ($sub_service->id == 32)
                        <form method="post" action="{{ route('web.pages.resource.download',$resource->id) }}">
                            @csrf()
                            <p class="DataRequired">{{__('lang.DataRequired')}}</p>
                            <div>
                                <label for="name">{{__('lang.fullName')}}</label>
                                <input type="text" name="name" id="name" required style="width: 100%;">
                            </div>
                            <div>
                                <label for="email">{{__('lang.email')}}</label>
                                <input type="email" name="email" id="email" required style="width: 100%;">
                            </div>
                            <div>
                                <label for="phone">{{__('lang.phone')}}</label>
                                <input type="text" name="phone" id="phone" required style="width: 100%;">
                            </div>
                            <div>
                                <label for="category">{{__('lang.category')}}</label>
                                <select name="category" id="category" style="width: 100%;">
                                    <option value="Care leaver">{{__('lang.Care_leaver')}}</option>
                                    <option value="Young in care">{{__('lang.Young_person_in_care')}}</option>
                                    <option value="Volunteer">{{__('lang.Volunteer')}}</option>
                                    <option value="Alternative care worker">{{__('lang.Alternative_care_worker')}}</option>
                                </select>
                            </div>
                            <div>
                                <label for="society">{{__('lang.organizationOrCompany')}}</label>
                                <input type="text" name="society" id="society" style="width: 100%;">
                            </div>
                            <button type="submit">{{__('lang.download')}}</button>
                        </form>
                    @endif
                </div>
                <div class="image">
                    <img src="{{asset('/storage/' . str_replace("\\" , "/",$sub_service->image))}}" alt="{{ $sub_service->$title }}">
                </div>
            </div>
        </section>
    @endif

    @if($sub_service->items->first() != null)
        @forelse($sub_service->items as $index => $items)
            <section id="service">
                <div class="service">
                    <div class="details">
                        <div class="title">
                            <span>0{{$index + 1}}</span>
                            <h1>{{ $items->$title }}</h1>
                        </div>
                        <p>{!! $items->$details !!}</p>
                        <div class="target">
                            <h1>{{__('lang.targeted_groups')}}</h1>
                            <p>{!! $items->$target !!}</p>
                        </div>
                    </div>
                    <div class="image">
                        <img src="{{asset('/storage/' . str_replace("\\" , "/",$items->image))}}" alt="{{ $items->$title }}">
                    </div>
                </div>
            </section>
        @empty
            <div class="alert alert-info">{{ __('lang.no_data') }}</div>
        @endforelse

    @endif
    <section id="service">
        <div class="service">
        @if($sub_service->id == 37)
            <a style="color:#fff;background:#35C0CA;width:15%;padding:20px;text-align: center;" href="https://forms.office.com/pages/responsepage.aspx?id=g11yLv_fmkufB2_5vZQDnYt-qNTHUTtCj-DLbk9A77NURElBTjhCT0JJRjA4VjVHTUhLSUFUNkpIWS4u&route=shorturl" target="_blank">{{ __('lang.Apply') }}</a>
        @else
             <a style="color:#fff;background:#35C0CA;width:15%;padding:20px;text-align: center;" href="https://forms.cloud.microsoft/r/JVGxFj8WXK" target="_blank">{{ __('lang.Apply') }}</a>
        @endif
        </div>
    </section>
    <div class="slider" style="margin-bottom:50px;">
    <div class="glide AllImpacts">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
            <li class="glide__slide"><img src="https://sanadorphans.org/storage/services-testimonials/original-8D046854-26FA-4919-872B-E55076023210.jpeg" alt="image" width="100" height="100"></li>
            <li class="glide__slide"><img src="https://sanadorphans.org/storage/services-testimonials/processed-C8A12AB2-750E-459C-8DE1-D5323AEB5839.jpeg" alt="image" width="100" height="100"></li>
            <li class="glide__slide"><img src="https://sanadorphans.org/storage/services-testimonials/processed-6D16A562-DCDA-424C-9D13-B4693705A5C5.jpeg" alt="image" width="100" height="100"></li>
            <li class="glide__slide"><img src="https://sanadorphans.org/storage/services-testimonials/processed-23419708-5B10-497B-ADE4-101499D8798C.jpeg" alt="image" width="100" height="100"></li>
            <li class="glide__slide"><img src="https://sanadorphans.org/storage/services-testimonials/original-C8D1C753-383E-42E0-B1A8-B295C6110E79.jpeg" alt="image" width="100" height="100"></li>
            <li class="glide__slide"><img src="https://sanadorphans.org/storage/services-testimonials/original-99554F2E-3989-44D5-BB8A-E59D177B9E1F.jpeg" alt="image" width="100" height="100"></li>

            </ul>
        </div>
        <div class="glide__arrows" data-glide-el="controls">
            <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><img src="{{asset('img/Home/blue-arrow.svg')}}" alt="blue-arrow" width="80px" height="80px"></button>
            <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><img src="{{asset('img/Home/blue-arrow.svg')}}" alt="blue-arrow" width="80px" height="80px"></button>
        </div>
    </div>
</div>

@endsection


@section('js')
    <script src="{{asset('js/Stories.js?v=1.2')}}"></script>
@endsection
