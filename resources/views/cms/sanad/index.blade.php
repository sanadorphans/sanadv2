@extends('web.layouts.master')

@section('header_tags')
    <title>{{ __('lang.sanad') }} | {{ __('lang.wataneya') }}</title>
    <meta itemprop="name" content="{{ __('lang.sanad') }} | {{ __('lang.wataneya') }}">
    <meta itemprop="description" content="{{ __('lang.Meta_description') }}">
    <meta itemprop="image" content="{{ asset('img/625d55fceb5d9.jpg') }}">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="{{ env('APP_URL') }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ __('lang.sanad') }} | {{ __('lang.wataneya') }}">
    <meta property="og:description" content="{{ __('lang.Meta_description') }}">
    <meta property="og:image" content="{{ asset('img/625d55fceb5d9.jpg') }}">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ __('lang.sanad') }} | {{ __('lang.wataneya') }}">
    <meta name="twitter:description" content="{{ __('lang.Meta_description') }}">
    <meta name="twitter:image" content="{{ asset('img/625d55fceb5d9.jpg') }}">
@endsection

@section('content')
    <style>
        a {
            color: black;
        }

        a:hover {
            color: #25cad2;
        }

        .staff-detail {
            font-size: 16px;
            text-align: start;
        }

        .container-fluid {
            padding-left: 0;
            padding-right: 0;
        }

        .title {
            display: grid;
            justify-items: center;
        }

        .search .submit {
            top: 10px !important;
            height: 70% !important;
        }

        .yellow-line {
            position: relative;
            width: 170px
        }

        .yellow-line::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 15px;
            background-color: #fdde0078;
            z-index: -1;
            border-radius: 50px;
        }

        .team-main .news-item {
            height: auto;
        }

        a.news-item {
            border-radius: 8px;
            box-shadow: 0px 12px 32px 0px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
    </style>
    @if (app()->getLocale() == 'ar')
        <style>
            .line2 {
                width: 120px
            }

            .yellow-line::before {
                top: 65%;
                right: -10px;
            }
        </style>
    @endif
    @if (app()->getLocale() == 'en')
        <style>
            .line2 {
                width: 65px
            }

            .yellow-line::before {
                top: 50%;
                right: 10px;
            }
        </style>
    @endif
    <style>
        .site-map a {
            background: none;

        }

        .site-map a:hover {
            background: none;

        }

        .site-map ul li p {
            font-size: 16px;
        }
    </style>





    @php
        
        function language($attr)
        {
            return app()->getLocale() == 'ar' ? $attr : $attr . '_en';
        }
        $title = language('title');
        $content = language('content');
        $image_src = language('image');
        $description = language('description');
    @endphp
    <div class="container-fluid remove-padding cont-main " style="margin-top: 80px">
        <div class="container remove-padding">
            <div class="col-xs-12 site-map">
                <ul>
                    <li><a href="{{ route('landing') }}">{{ __('lang.home') }}</a></li>
                    <li>
                        <p>{{ __('lang.sanad') }}</p>
                    </li>
                </ul>
            </div>
        </div>

        <div class="project-main" style="margin-top:0 !important">



            @if (app()->getLocale() == 'ar')
                
            
            <style>
                .yellow-line {
                    position: relative;
                    width: 170px;
                    height: 30px;
                }

                .line1 {
                    width: 150px;
                }

                .line2 {
                    width: 140px;
                }

                .yellow-line::before {
                    content: "";
                    position: absolute;
                    top: 65%;
                    right: -10px;
                    width: 100%;
                    height: 15px;
                    background-color: #fdde0078;
                    z-index: -1;
                    border-radius: 50px;
                }

                .sanad {
                    margin: 50px 0 50px 0;
                }

                .sanad .container {
                    width: 1160px;
                    margin: auto;
                    display: grid;
                    grid-template-areas: "forum confe";
                }

                .sanad .container a {
                    background: none;
                    margin-top: -100px;
                    justify-self: end;
                    margin: -50px 0 0 30px;
                    height: 50px !important;
                }

                button:hover {
                    color: #58585b;
                }

                .sanad .container h1 {
                    font-size: 30px;
                    margin-top: 30px;
                }

                .sanad .container p {
                    text-align: justify;
                    font-size: 16px;
                    width: 90%;
                    margin-top: 0px;
                }

                .forum {
                    margin-left: 20px;
                    grid-area: forum;
                    padding: 100px 0px 0px 0px;
                }

                .conference {
                    margin-right: 20px;
                    grid-area: confe;
                    padding: 100px 0px 100px 0px;
                }

                .forum,
                .conference {
                    display: grid;
                    justify-items: center;
                    grid-template-areas: "img""h1""p""a";
                    box-shadow: 0px 16px 32px 0px rgb(0 0 0 / 10%);
                    grid-template-rows: 300px 100px 400px 50px;
                    height: 85%
                }

                .forum img,
                .conference img {
                    border-radius: 10px;
                    width: 300px;
                    height: 300px;
                    grid-area: img;
                }

                .forum h1,
                .conference h1 {
                    grid-area: h1;
                    margin-top: 30px;
                }

                .forum p,
                .conference p {
                    line-height: 35px;
                    grid-area: p;
                }

                .forum a,
                .conference a {
                    grid-area: a;
                }


                @media (max-width: 1200px) {
                    .sanad .container {
                        width: 990px;
                        grid-template-areas: "forum""confe";
                        justify-items: center;
                    }

                    .sanad .container a {
                        height: auto !important;
                        margin: 50px;
                    }

                    .sanad .container h1 {
                        margin-top: 30px;
                    }

                    .sanad .container p {
                        margin-top: 0px;
                    }

                    .forum,
                    .conference {
                        width: auto;
                        margin: 0 0 100px 0;
                        grid-template-rows: auto;
                        height: auto;
                    }

                    .conference {
                        grid-template-rows: auto auto auto 20px;
                    }
                }

                @media (max-width:990px) {
                    .sanad .container {
                        width: auto;
                        margin: 0 50px 0 50px;
                    }

                    .forum,
                    .conference {
                        width: auto;
                    }

                }

                @media (max-width: 700px) {
                    .sanad .container p {
                        width: 100%;
                        padding: 0px 20px 0px 20px;
                    }

                    .forum img,
                    .conference img {
                        width: 300px;
                        height: 300px;
                    }

                    .forum h1,
                    .conference h1 {
                        margin: 30px 0 30px 0;
                    }

                    .forum p {
                        margin-top: 0px;
                    }
                }

                @media (max-width:500px) {
                    .sanad .container {
                        width: auto;
                        margin: 0 10px 0 10px;
                    }

                    .sanad .container a {
                        margin: 50px 50px 50px 30px;
                    }

                }

                @media (max-width:400px) {

                    .forum img,
                    .conference img {
                        width: 200px;
                        height: 200px;
                    }
                }
            </style>
            @else

            <style>
                .yellow-line {
                    position: relative;
                    width: 170px;
                    height: 30px;
                }

                .line1 {
                    width: 190px;
                }

                .line2 {
                    width: 260px;
                }

                .yellow-line::before {
                    content: "";
                    position: absolute;
                    top: 40%;
                    right: 10px;
                    width: 100%;
                    height: 15px;
                    background-color: #fdde0078;
                    z-index: -1;
                    border-radius: 50px;
                }

                .sanad {
                    margin: 50px 0 50px 0;
                }

                .sanad .container {
                    width: 1160px;
                    margin: auto;
                    display: grid;
                    grid-template-areas: "forum confe";
                }

                .sanad .container a {
                    background: none;
                    margin-top: -100px;
                    justify-self: end;
                    margin: -70px 30px 0 0px;
                    height: 50px !important;
                }

                button:hover {
                    color: #58585b;
                }

                .sanad .container h1 {
                    font-size: 30px;
                    margin-top: 30px;
                }

                .sanad .container p {
                    text-align: justify;
                    font-size: 16px;
                    width: 90%;
                    margin-top: 0px;
                }

                .forum {
                    margin-right: 20px;
                    grid-area: forum;
                    padding: 100px 0px 0px 0px;
                }

                .conference {
                    margin-left: 20px;
                    grid-area: confe;
                    padding: 100px 0px 100px 0px;
                }

                .forum,
                .conference {
                    display: grid;
                    justify-items: center;
                    grid-template-areas: "img""h1""p""a";
                    box-shadow: 0px 16px 32px 0px rgb(0 0 0 / 10%);
                    grid-template-rows: 300px 100px 550px 50px;
                    height: 85%
                }

                .forum img,
                .conference img {
                    border-radius: 10px;
                    width: 300px;
                    height: 300px;
                    grid-area: img;
                }

                .forum h1,
                .conference h1 {
                    grid-area: h1;
                    margin-top: 30px;
                }

                .forum p,
                .conference p {
                    line-height: 35px;
                    grid-area: p;
                }

                .forum a,
                .conference a {
                    grid-area: a;
                }


                @media (max-width: 1200px) {
                    .sanad .container {
                        width: 990px;
                        grid-template-areas: "forum""confe";
                        justify-items: center;
                    }

                    .sanad .container a {
                        height: auto !important;
                        margin: 50px;
                    }

                    .sanad .container h1 {
                        margin-top: 30px;
                    }

                    .sanad .container p {
                        margin-top: 0px;
                    }

                    .forum,
                    .conference {
                        width: auto;
                        margin: 0 0 100px 0;
                        grid-template-rows: auto;
                        height: auto;
                    }

                    .conference {
                        grid-template-rows: auto auto auto 20px;
                    }
                }

                @media (max-width:990px) {
                    .sanad .container {
                        width: auto;
                        margin: 0 50px 0 50px;
                    }

                    .forum,
                    .conference {
                        width: auto;
                    }

                }

                @media (max-width: 700px) {
                    .sanad .container p {
                        width: 100%;
                        padding: 0px 20px 0px 20px;
                    }

                    .forum img,
                    .conference img {
                        width: 300px;
                        height: 300px;
                    }

                    .forum h1,
                    .conference h1 {
                        margin: 30px 0 30px 0;
                    }

                    .forum p {
                        margin-top: 0px;
                    }
                }

                @media (max-width:500px) {
                    .sanad .container {
                        width: auto;
                        margin: 0 10px 0 10px;
                    }

                    .sanad .container a {
                        margin: 50px 50px 50px 30px;
                    }

                }

                @media (max-width:400px) {

                    .forum img,
                    .conference img {
                        width: 200px;
                        height: 200px;
                    }
                }
            </style>

            @endif

            <section class="sanad">
                <div class="container row">


                    @forelse ($sanad_items as $index => $sanad_item)
                        <div class="@if ($index % 2 == 0) forum @else conference @endif"><img class="img"
                                alt="{{ $sanad_item->$title }}"
                                src="https://wataneya.org/storage/media/photos/shares/613c6c9cb6bf2.png">
                            <h1 class="yellow-line line1">{{ $sanad_item->$title }}</h1>
                            <p>
                                {{ $sanad_item->$description }}
                            </p>
                            <a href="{{ $sanad_item->link }}" target="_blank" rel="noopener">المزيد</a>
                        </div>
                    @empty
                    @endforelse



            </section>

        </div>


    </div>
@endsection
