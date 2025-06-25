
<?php
    $socials = App\Models\SocialMedia::get();
    $PartnersTypes = App\Models\PartnerType::get();

    $logo_ar = Voyager::setting('site.logo', '');
    $logo_en = Voyager::setting('site.logo_en', '');
    $title_ar = Voyager::setting('site.title', __('lang.sanad'));
    $title_en = Voyager::setting('site.title_en', __('lang.sanad'));
    $description_ar = Voyager::setting('site.description', __('lang.Meta_description'));
    $description_en = Voyager::setting('site.description_en', __('lang.Meta_description'));
    $url = url()->full();
?>


<!DOCTYPE html>
<html dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" lang="{{ app()->getLocale() }}">
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-K8F3Z52H');</script>
    <!-- End Google Tag Manager -->

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta http-equiv="Content-Security-Policy" content="script-src 'self' https://cdnjs.cloudflare.com/ 'unsafe-inline';"> --}}
    <!-- ترميز JSON-LD تم إنشاؤه بواسطة مساعد ترميز البيانات المنظمة. -->
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-D6P2CZECSG"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-D6P2CZECSG');
    </script>
    <script type="application/ld+json">
        {
        "@context": "http://schema.org",
        "@type": "Non-ProfitOrganization",
        "name": "سند",
        "startDate": "يُرجى إدراج تاريخ/وقت صالح وفقًا لتنسيق ISO 8601 هنا. أمثلة: 2015-07-27 أو 2015-07-27T15:30",
        "location": {
            "@type": "Place",
            "name": "سند للرعاية الوالدية البديلة",
            "address": {
            "@type": "PostalAddress",
            "streetAddress": "3 شارع البيروني بجوار قصر البارون",
            "addressLocality": "مصر الجديدة",
            "addressRegion": "القاهرة",
            "addressCountry": "مصر"
            }
        },
        "image": "https://sanadorphans.org/storage/settings/December2023/DD278AxgH4OZ4CaojgT4.png",
        "description": "ونحن نعمل بهدف الحياة الكريمة لكل طفل وشاب فاقد للرعاية الوالدية. فكنا وطناً يقدم لهم الدعم ويعمل بمنظور شمولي لتطوير منظومة الرعاية الوالدية البديلة من خلال تطوير بيوت  الرعاية، تمكين الشباب الأيتام، وتطوير منظومة الكفالة. والآن أصبجنا “سند” تجسيدا لمعنى الدعم والتأييد للأيتام، وتجسيدا لكونهم هم أيضاً سنداً ودعماً لمجتمعاتهم بإدراكهم لحقوقهم وقدراتهم وتفدرهم",
        "url": "https://sanadorphans.org"
        }
    </script>
    <link rel="canonical" href="{{$url}}"/>
    <meta name="description" content="{{ app()->getLocale() == 'ar' ? $description_ar : $description_en }}">
    <meta name="keywords" content="{{ app()->getLocale() == 'ar' ? $title_ar : $title_en}}">
    <meta name="author" content="{{ app()->getLocale() == 'ar' ? $title_ar : $title_en}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ Voyager::image(app()->getLocale() == 'ar' ? $logo_ar : $logo_en) }}">
    <link rel="shortcut icon" href="{{ Voyager::image(app()->getLocale() == 'ar' ? $logo_ar : $logo_en) }}" type="image/png">
    <title>{{ app()->getLocale() == 'ar' ? $title_ar : $title_en}} | @yield('page_name') </title>
    {{-- meta keywords --}}
    <meta name="keywords" content="{{ app()->getLocale() == 'ar' ? $title_ar : $title_en}}">

    <meta itemprop="name" content=" @yield('page_name') | {{ app()->getLocale() == 'ar' ? $title_ar : $title_en}}">
    <meta itemprop="description" content="{{ app()->getLocale() == 'ar' ? $description_ar : $description_en }}">
    <meta itemprop="image" content="{{ Voyager::image(app()->getLocale() == 'ar' ? $logo_ar : $logo_en) }}">

    <!-- Facebook Meta Tags -->
    <meta property="og:title" content=" @yield('page_name') | {{ app()->getLocale() == 'ar' ? $title_ar : $title_en}}">
    <meta property="og:site_name" content=" @yield('page_name') | {{ app()->getLocale() == 'ar' ? $title_ar : $title_en}}">
    <meta property="og:url" content="{{ env('APP_URL') }}">
    <meta property="og:type" content="website">
    <meta property="og:description" content="{{ app()->getLocale() == 'ar' ? $description_ar : $description_en }}">
    <meta property="og:image" content="{{ Voyager::image(app()->getLocale() == 'ar' ? $logo_ar : $logo_en) }}">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:title" content=" @yield('page_name') | {{ app()->getLocale() == 'ar' ? $title_ar : $title_en}}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="{{ app()->getLocale() == 'ar' ? $description_ar : $description_en }}">
    <meta name="twitter:image" content="{{ Voyager::image(app()->getLocale() == 'ar' ? $logo_ar : $logo_en) }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.2.0/css/glide.theme.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    <link rel="stylesheet" href="{{asset('css/Master.css?v=3.6')}}"/>
    @yield('style')

    <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/25ba645f10169963cf352dcf8/30c2c3c184cc8965f4d9de383.js");</script>
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K8F3Z52H"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    @include('web.inc.navbar')
    @yield('content')
    @include('web.inc.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.2.0/glide.min.js"></script>
    <script src="{{asset('js/master.js?v=2.3')}}"></script>
    <script>
        jQuery.event.special.touchstart = {
            setup: function( _, ns, handle ) {
                this.addEventListener("touchstart", handle, { passive: !ns.includes("noPreventDefault") });
            }
        };
        jQuery.event.special.touchmove = {
            setup: function( _, ns, handle ) {
                this.addEventListener("touchmove", handle, { passive: !ns.includes("noPreventDefault") });
            }
        };
        jQuery.event.special.wheel = {
            setup: function( _, ns, handle ){
                this.addEventListener("wheel", handle, { passive: true });
            }
        };
        jQuery.event.special.mousewheel = {
            setup: function( _, ns, handle ){
                this.addEventListener("mousewheel", handle, { passive: true });
            }
        };
    </script>
    @yield('js')
    @stack('scripts')
</body>
</html>
