<!DOCTYPE html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8" />
  <title>LuxSpace</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <meta property="og:title" content="" />
  <meta property="og:type" content="" />
  <meta property="og:url" content="" />
  <meta property="og:image" content="" />

  {{--
  <link rel="manifest" href="site.webmanifest" /> --}}
  <link rel="apple-touch-icon" href="{{ asset('frontend/images/content/favicon.png')}}" />
  <!-- Place favicon.ico in the root directory -->

  {{--
  <link rel="stylesheet" href="{{ asset('frontend/css/main.css')}}"> --}}
  <link rel="icon" href="{{ asset('frontend/images/content/favicon.png')}}">

  <meta name="theme-color" content="#000" />
  <link rel="icon" href="{{ asset('frontend/favicon.ico')}} " />
  <link href="{{ asset('frontend/css/app.minify.css') }}" rel="stylesheet" />
</head>

<body>
  <!-- Add your site or application content here -->

  @include('components.frontend.navbar')
  @yield('content')
  @include('components.frontend.footer')

  <!-- START: LOAD SVG -->
  <!-- <svg width="23" height="26" class="hidden" id="icon-play">
      <path
        d="M21 9.536c2.667 1.54 2.667 5.39 0 6.928l-15 8.66c-2.667 1.54-6-.385-6-3.464V4.34C0 1.26 3.333-.664 6 .876l15 8.66z"
        fill="#fff"
      />
    </svg> -->
  <!-- END: LOAD SVG  -->

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () {
        ga.q.push(arguments);
      };
      ga.q = [];
      ga.l = +new Date();
      ga("create", "UA-XXXXX-Y", "auto");
      ga("set", "anonymizeIp", true);
      ga("set", "transport", "beacon");
      ga("send", "pageview");
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
  <script src="{{ asset('frontend/js/app.js')}}"></script>
</body>

</html>